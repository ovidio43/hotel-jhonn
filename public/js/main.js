$(document).ready(function() {
    $('.default-date').Zebra_DatePicker();
    $('#date-start').Zebra_DatePicker({
        direction: true,
        pair: $('#date-end'),
        always_visible: $('#caledar-visible1')
    });

    $('#date-end').Zebra_DatePicker({
        direction: 1,
        always_visible: $('#caledar-visible2')
    });
    $('body').on('click', '.Zebra_DatePicker', function() {
        var ini = $('#date-start').val();
        var end = $('#date-end').val();
        var dias = getDias(ini, end);
        if (!isNaN(dias)) {
            $('#dias').val(dias);
            $('#total').val(getTotal());
            var total = parseFloat($('#total').val());
            var monto = parseFloat($('#monto').val());
            $('#saldo').val(getSaldo(total, monto));
        }
    });
    /**********autocompletar cliente**************************/
    var clienteUrl = $("#cliente").attr('rel');
    $('body').on('focusout', '#cliente', function(e) {
        if ($(this).val() == '') {
            $('#id_cliente').val('');
        }
    });
    $("#cliente").autocomplete({
        source: clienteUrl,
        minLength: 2,
        select: function(event, ui) {
            $('#id_cliente').val(ui.item.id);
        }
    });

    /************************************/

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

    $('body').on('click', 'button.detail-close', function() {
        window.location = "create";
    });
    $('body').on('click', 'button.close', function() {
        $('#loginModal').removeClass('show');
    });

    $('body').on('click', 'input[name=id_precio]', function() {
        $('#id_moneda').val($(this).attr('moneda_id'));
        $('#total').val(getTotal());
        var total = parseFloat($('#total').val());
        var monto = parseFloat($('#monto').val());
        $('#saldo').val(getSaldo(total, monto));
    });

    $('body').on('focusout', '#monto', function(e) {
        if (isNaN(parseFloat(($(this).val())))) {
            $(this).val(0);
        }
    });
    $('body').on('keyup', '#monto', function(e) {
        var total = parseFloat($('#total').val());
        var monto = parseFloat($('#monto').val());
        if (monto > total) {
            $('#monto').val(total);
            monto = total;
        }
        $('#saldo').val(getSaldo(total, monto));
    });
    $('body').on('click', '.realizar-cobro', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('.custom-loading').show();
        $.get(url, function(data) {
            $('#loginModal').empty().append(data);
        }).complete(function() {
            $('#loginModal').addClass('show');
            $('.custom-loading').hide();
        });
    });

    $('body').on('click', '#cobrar', function(e) {
        e.preventDefault();
        var thisObj = $(this);
        var data = $('#custom-form').serialize();
        var url = thisObj.attr('href');
        $('.custom-loading').show();
        $.post(url, data, function(data) {
            $('tr#' + thisObj.next('input').val()).empty().append(data);
        }).complete(function() {
            $('#loginModal').removeClass('show');
            $('.custom-loading').hide();
        });
    });
    $('body').on('click', '.liberar', function(e) {
        e.preventDefault();
        var thisObj = $(this);
        var url = thisObj.attr('href');
        var status = confirm("¿Está Seguro de liberar la Reserva Seleccionada?");
        if (status) {
            $('.custom-loading').show();
            $.get(url, function(data) {
                if (data === 'ok') {
                    thisObj.parent().parent().remove();
                }
            }).complete(function() {
                $('.custom-loading').hide();
            });
        }
    });
    $('body').on('click', '.pasar-cuenta', function(e) {
        e.preventDefault();
        var thisObj = $(this);
        var url = thisObj.attr('href');
        var status = confirm("¿Está seguro de pasar a una Cuenta por Cobrar?");
        if (status) {
            $('.custom-loading').show();
            $.get(url, function(data) {
                thisObj.parent().parent().empty().append(data);
            }).complete(function() {
                $('.custom-loading').hide();
            });
        }
    });

    $('body').on('click', '#nuevo-cliente', function(e) {
        e.preventDefault();
        $('#loginModal').addClass('show');
    });
    $('body').on('click', '#guardar-cliente', function(e) {
        e.preventDefault();
        $('.custom-loading').addClass('show');
        $.post($(this).attr('href'), $("#new-client").serialize(), function(data) {
            if (data === 'ok') {
                $('#loginModal').removeClass('show');
                limpiarformulario($("#new-client"));
            } else {
                $('#loginModal').empty().append(data);
            }
        }).complete(function() {
            $('.custom-loading').removeClass('show');
        });
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
function getSaldo(total, monto) {
    var saldo = 0;
    saldo = total - monto;
    if (isNaN(saldo)) {
        saldo = 0;
    }
    return saldo;
}
function getTotal() {
    var total = 0;
    var dias = parseFloat($('#dias').val());
    var amount = parseFloat($('input[name=id_precio]:checked').attr('title'));
    total = (amount * dias);
    if (isNaN(total)) {
        total = 0;
    }
    return total;
}
function getDias(ini, fin) {
    return ((new Date(fin) - new Date(ini)) / 24 / 3600000);
}

function limpiarformulario(formulario) {
    /* Se encarga de leer todas las etiquetas input del formulario*/
    jQuery(formulario).find('input').each(function() {
        switch (this.type) {
            case 'password':
            case 'text':
//            case 'hidden':
            case 'file':
                $(this).val('');
                break;
            case 'checkbox':
            case 'radio':
                this.checked = false;
        }
    });

    /* Se encarga de leer todas las etiquetas select del formulario */
    $(formulario).find('select').each(function() {
        $("#" + this.id + " option[value=0]").attr("selected", true);
    });
    /* Se encarga de leer todas las etiquetas textarea del formulario */
    $(formulario).find('textarea').each(function() {
        $(this).val('');
    });
}
