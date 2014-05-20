<?php


$monto = 0;
foreach ($Reserva->pago as $rowPago) {
    echo $rowPago->monto;
    $monto+=$rowPago->monto;    
}




?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
           
            <h5 class="text-center">Login</h5>
            <div class="row">
                <div class="col-md-3">
                    <label>TOTAL</label>
                    <input type="text" readonly value="<?php echo $Reserva->total;?>" id="" name="" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Monto a cuenta</label>
                    <input type="text" readonly value="<?php echo $monto;?>" id="" name="" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Pago pendiente</label>
                    <input type="text" readonly value="<?php echo ($Reserva->total - $monto);?>" id="" name="" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>TOTAL</label>
                    <input type="text" value="" id="" name="" class="form-control">
                </div>                  
            </div>
        </div>        
    </div>
</div>


