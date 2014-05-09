$(document).ready(function() {
    $('#date-start').Zebra_DatePicker({
        direction: true,
        pair: $('#date-end'),
        always_visible: $('#caledar-visible1')
    });

    $('#date-end').Zebra_DatePicker({
        direction: 1,
        always_visible: $('#caledar-visible2')
    });


    $('.a-delete').on('click', function() {
        var status = confirm("Se Eliminará el Item Seleccionado!!!");
        if (status == false) {
            return false;
        } else {
            $(this).next('form').submit();
        }
    });
    /*****accion cerrar sesion***********/
    $('#link-closeSession').on('click', function(e) {
        e.preventDefault();
        $(this).parent().submit();
    });
    /*****accion traer listado de objectos del modulo parametros***********/
    $('body').on('click', '.get-list', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $(this).parent().siblings().removeClass('active');
        $(this).parent().addClass('active');
        sendRequest(url, 'GET');
    });
    /*****accion traer formulario para nuevo item en modulo parametros***********/
    $('body').on('click', '.new-item', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        sendRequest(url, 'GET');
    });
    /*****accion enviar datos de formulario de nuevo item en modulo parametros***********/
    $('body').on('submit', '.form-new-item', function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serialize();
        sendRequest(url, 'POST', data);
    });
    $('body').on('click', '.a-delete-ajax', function(e) {
        e.preventDefault();
        var currentObj = $(this);
        var currentform = currentObj.next('form');
        var url = currentform.attr('action');
        var data = currentform.serialize();

        currentObj.submit(function(f) {
            f.preventDefault();
            alert('jasdofjasñodfhlkzsdjh');
        });

//        $.post(url, data, function(data) {
//            if (data == 'ok') {
//                currentObj.parent().parent().remove();
//            }
//        });

    });

    /******accion adicionar inputs para aignar precio a tipo de habitacion en modulo administracion*******/
    $('body').on('click', '#add-price', function(e) {
        e.preventDefault();
        var thisObj = $(this);
        thisObj.hide();
        thisObj.next().show();
        var cantPrice = $('input#prices').val();
        var url = thisObj.attr('href');
        cantPrice++;
        $.get(url + '/' + cantPrice, function(data) {
            thisObj.parent().parent().siblings('#content-button').before(data);
        }).complete(function() {
            $('input#prices').val(cantPrice);
            thisObj.next().hide();
            thisObj.show();
        });
    });
    $('body').on('click', '.remove-price', function(e) {
        e.preventDefault();
        $(this).parent().remove();
        var cantPrice = $('input#prices').val();
        cantPrice--;
        $('input#prices').val(cantPrice);
    });
    $('body').on('click', '.delete-price', function(e) {
        e.preventDefault();
        var thisObj = $(this);
        var url = thisObj.attr('href');
        var cantPrice = $('input#prices').val();
        var status = confirm("Se Eliminará el precio seleccionado!!!");
        if (status) {
            $.get(url, function(data) {
                if (data == 'ok') {
                    thisObj.parent().remove();
                    cantPrice--;
                    $('input#prices').val(cantPrice);
                }
            });
        }
    });
    /***************************************/

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

