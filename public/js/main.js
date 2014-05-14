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
    /*****************calculando total **********************/

    $('.cb-hab').on('click', function() {
        var id_moneda = 0;
        var amount = 0;
        var total = parseFloat($('#total').val());
        id_moneda = $('input[name=id_moneda]:checked').attr('value');
        if (typeof (id_moneda) === 'undefined') {
            $(this).attr('checked', false);
            alert('Debe Seleccionar moneda para realizar los calculos');
        } else {
            amount = $(this).next().children('p.moneda-' + id_moneda).children('input').val();
            if (typeof (amount) !== 'undefined') {
                if ($(this).is(':checked')) {
                    total += parseFloat(amount);
                } else {
                    total -= parseFloat(amount);
                }
            } else {
                $(this).attr('checked', false);
                alert('Esta habitación no tiene un precio con ese tipo de moneda');
            }
            $('#total').val(total);
            calcularSaldo();
        }

    });
    $('input[name=id_moneda]').on('change', function() {
        var id_moneda = $(this).val();
        var amount = 0;
        var total = 0;
        $('input.cb-hab').each(function() {
            if ($(this).is(':checked')) {
                amount = $(this).siblings().children('p.moneda-' + id_moneda).children('input').val();
                if (typeof (amount) !== 'undefined') {
                    total += parseFloat(amount);
                } else {
                    $(this).attr('checked', false);
                }
            }
        });
        $('#total').val(total);
        calcularSaldo();
    });

    $('#monto').on('keyup', function(e) {
        calcularSaldo();
    });


    $('.only-numeric').keypress(function(e) {
        var charCode = (typeof e.which == "number") ? e.which : e.keyCode;
        // Firefox will trigger this even on nonprintabel chars... allow them.
        switch (charCode) {
            case 8: // Backspace
            case 0: // Arrow keys, delete, etc
                return true;
            default:
        }

        var lastChar = String.fromCharCode(charCode);

        // Reject anything not numbers or a comma
        if (!lastChar.match("[0-9]|.")) {
            return false;
        }

        // Reject comma if 1st character or if we already have one
        if (lastChar == "." && this.value.length == 0) {
            return false;
        }
        if (lastChar == "." && this.value.indexOf(".") != -1) {
            return false;
        }

        // Cut off first char if 0 and we have a comma somewhere
        if (this.value.indexOf(".") != -1 && this.value[0] == "0") {
            this.value = this.value.substr(1);
        }
        return true;
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
function calcularSaldo() {
    var total = parseFloat($('#total').val());
    var monto = parseFloat($('#monto').val());
    var saldo = 0;
    saldo = total - monto;
    $('#saldo').val(saldo);
}