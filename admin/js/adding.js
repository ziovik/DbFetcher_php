$(function () {
    $(".add_contargent").click(function (event) {
        var code = $("#code").val();
        var idrref = $("#idrref").val();
        var name = $("#name").val();
        var naimnovanie_polnoe = $("#naimnovanie_polnoe").val();
        var inn = $("#inn").val();
        var commentary = $("#commentary").val();
        var kpp  = $("#kpp").val();
        var pokupatel = $("#pokupatel").val();
        var postavshik = $("#postavshik").val();
        var ne_yavlyaetsya_rezidentom = $("#ne_yavlyaetsya_rezidentom").val();
        var okpo = $("#okpo").val();

        var dataString = 'code=' + code + '&idrref=' + idrref + '&name=' + name + '&naimnovanie_polnoe=' + naimnovanie_polnoe + '&inn=' + inn + '&commentary=' + commentary + '&kpp=' + kpp + '&pokupatel=' + pokupatel
            + '&postavshik=' + postavshik + '&ne_yavlyaetsya_rezidentom=' + ne_yavlyaetsya_rezidentom + '&okpo=' + okpo  ;
        console.log(dataString);
        if (name == '' || inn == '' )
        {
            $('.success').fadeOut(200).hide();
            $('.error').fadeOut(200).show();
        } else
        {
            $.ajax({
                type: "POST",
                url: "usingAjax/adding.php",
                data: dataString,
                success: function (data) {
                    $('.success').fadeIn(200).show();
                    $('.error').fadeOut(200).hide();
                    $("#data").html(data);
                }
            });
        }
        event.preventDefault();
    });
});