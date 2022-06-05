$(document).ready(function() {
    $("#regionButton").click(
        function(){
            sendAjaxFormRegion('result', 'ajaxFormRegion', 'ajax/ajaxr.php');
            return false;
        }
    );
});
function sendAjaxFormRegion(result, ajax_form, url) {

    $.ajax({
        url:      url,
        type:     "POST",
        dataType: "html",
        data: $("#"+ajax_form).serialize(),
        beforeSend: function(){
            $("#regionButton").prop("disabled", true);
        },
        success: function(response) {
            result = $.parseJSON(response);
            $('#result').html(result.message+'<br>Регион: '+result.region+'<br>Дата отправления: '+result.date+'<br>Имя курьера: '
                +result.courier+'<br>дата прибытия: '+result.arrival);
            $("#regionButton").prop("disabled", false);
        },
        error: function(response) {
            $('#result').html('Ошибка. Данные не отправлены.');
        }
    });

}