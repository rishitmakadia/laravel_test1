import './bootstrap';

$(document).ready(function () {
    $('#cancel').click(function () {
        $("form[name='myForm']")[0].reset();
    })
});