<div class="form-group">    
    <a href="#" class="remove-price"><span class="glyphicon glyphicon-remove"></span></a>
    {{Form::label('monto'.$numPrices, 'Precio',['class'=>'col-sm-1 control-label'])}}
    <div class="col-sm-2">
        {{ Form::text('monto'.$numPrices,'',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('monto'.$numPrices)}}</span>
    </div>
    {{Form::label('personas'.$numPrices, 'Personas',['class'=>'col-sm-1 control-label'])}}
    <div class="col-sm-2">
        <select name="personas<?php echo $numPrices; ?>" class="form-control" id="personas<?php echo $numPrices; ?>">
            <?php
            for ($i = 1; $i < 11; $i++) {
                ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php
            }
            ?>
        </select>
        <span class="error">{{ $errors->first('monto'.$numPrices)}}</span>      
    </div>
    {{Form::label('id_moneda'.$numPrices, 'Moneda',['class'=>'col-sm-1 control-label'])}}
    <div class="col-sm-2">
        <select name="id_moneda{{$numPrices}}" id="id_moneda{{$numPrices}}" class="form-control" >             
            @foreach($Moneda as $row)             
            <option value="{{$row->id}}">{{$row->simbolo}}</option>         
            @endforeach
        </select>                
        <span class="error">{{ $errors->first('id_moneda'.$numPrices)}}</span>
    </div>    
</div>

