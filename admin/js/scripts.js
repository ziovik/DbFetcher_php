$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Выберите город</option>');
                }
            });
        }else{
            $('#state').html('<option value="">Выберите Регион</option>');
            $('#city').html('<option value="">Выберите город</option>');
        }
    });

    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                    $('#area').html('<option value="">Выберите Район</option>');
                }
            });
        }else{
            $('#city').html('<option value="">Выберите страну</option>');
            $('#area').html('<option value="">Выберите Район</option>');
        }
    });
    $('#city').on('change', function () {
        var cityID = $(this).val();
        if(cityID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'city_id='+cityID,
                success:function(html){
                    $('#area').html(html);

                }
            });

        }else{
            $('#area').html('<option value="">Выберите город</option>');
        }

    });
});