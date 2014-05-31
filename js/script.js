function showFormOk() {
    $("#order>input[type='text']").val("");
    $("#order>textarea").val("");
    $("body").prepend("<div id='message' style='position: fixed; top: 0; font-size: 18px; left: 0; width: 100%; background-color: #DE2828; color: #fff; padding: 10px; opacity: .9; z-index: 9999; text-align: center;'>Ваша заявка отправлена менеджеру</div>");
    $('#message').delay(2500).fadeOut();
}
$(function() {
    Galleria.loadTheme('/js/galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('.galleria');
    $('#order').ajaxForm(function() {
        showFormOk();
    });
})