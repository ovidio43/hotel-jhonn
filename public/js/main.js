$(document).ready(function() {
    $('.a-delete').on('click', function() {
        var status = confirm("Se Eliminará el Item Seleccionado!!!");
        if (status == false) {
            return false;
        } else {
            $(this).next('form').submit();
        }
    });
    $('#link-closeSession').on('click', function(e) {
        e.preventDefault();
        $(this).parent().submit();
    });
    $('body').on('click', '.get-list', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $(this).parent().siblings().removeClass('active');
        $(this).parent().addClass('active');
        sendRequest(url, 'GET');
    });
    $('body').on('click', '.new-item', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        sendRequest(url, 'GET');
    });
    $('body').on('submit', '.form-new-item', function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        console.log(url);
        console.log(data);
        sendRequest(url, 'POST', data);
    });
});
function sendRequest(url, method, data) {
    $.ajax({
        type: method,
        url: url,
        cache: false,
        data: data,
        beforeSend: function() {
            $('.custom-loading').show();
        },
        success: function(data) {
            $('#content-parmas').empty().append(data);
            $('.custom-loading').hide();
        }
    });
}

