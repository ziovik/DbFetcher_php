$(document).ready(function () {

    $('#country').on('change', function () {
        var countryID = $(this).val();
        if (countryID) {
            $.ajax({
                type: 'POST',
                url: 'ajaxData.php',
                data: 'country_id=' + countryID,
                success: function (html) {
                    $('#state').html(html);
                    $('#city').html('');
                    $('#area').html('');
                    displayFullAddress();
                }
            });
        } else {
            $('#state').html('<option value="">Выберите Регион</option>');

        }
    });

    $('#state').on('change', function () {
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: 'POST',
                url: 'ajaxData.php',
                data: 'state_id=' + stateID,
                success: function (data) {
                    let someObject = JSON.parse(data, function(key, value) {
                        console.log(key);
                    });
                    // let cities = JSON.parse("cities");
                    // let areas = JSON.parse("areas");
                    // fillCities(cities);
                    // fillAreas(areas);
                    displayFullAddress();
                }
            });
        } else {
            $('#city').html('<option value="">Выберите Город</option>');
            $('#area').html('<option value="">Выберите Район</option>');
        }
    });
    $('#city').on('change', function () {
        var cityID = $(this).val();
        if (cityID) {
            $.ajax({
                type: 'POST',
                url: 'ajaxData.php',
                data: 'city_id=' + cityID,
                success: function (html) {
                    $('#area').html(html);
                    displayFullAddress();
                }
            });

        } else {
            $('#area').html('<option value="">Выберите район</option>');
        }

    });
    $('#area').on('change', function () {
        var areaID = $(this).val();
        if (areaID) {
            $.ajax({
                type: 'POST',
                url: 'ajaxData.php',
                data: 'area_id=' + areaID,
                success: function (html) {
                    $('#street').html(html);
                    displayFullAddress();
                }
            });

        } else {
            $('#street').html('<option value="">Выберите Улицу</option>');
        }

    });

    function fillCities(cities) {
        $.each(cities, function(key, value) {
            $('#city')
                .append($("<option></option>")
                    .attr("value", key)
                    .text(value));
        });
    }

    function displayFullAddress() {
        var country = $("#country option:selected").text();
        var countryId = $("#country option:selected").val();

        var state = $("#state option:selected").text();
        var stateId = $("#state option:selected").val();

        var city = $("#city option:selected").text();
        var cityId = $("#city option:selected").val();

        var area = $("#area option:selected").text();
        var areaId = $("#area option:selected").val();

        var index = $("#index option:selected").text();
        var indexId = $("#index option:selected").val();

        var street = $("#street option:selected").text();
        var streetId = $("#street option:selected").val();

        var house = $("#house option:selected").text();
        var houseId = $("#house option:selected").val();

        var flat = $("#flat").val();

        let address =
            ((countryId === "") ? "" : country)
            + ((stateId === "") ? "" : (", " + state))
            + ((cityId === "") ? "" : (", " + city))
            + ((areaId === "") ? "" : (", " + area))
            + ((indexId === "") ? "" : (", " + index))
            + ((streetId === undefined) ? "" : (", " + street))
            + ((houseId === undefined) ? "" : (", " + house))
            + ((flat === "") ? "" : (", " + flat));
        $("#note").val(address);
    }
});