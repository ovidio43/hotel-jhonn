<div class="form-group">
    
    <a href="#" class="remove-price"><span class="glyphicon glyphicon-remove"></span></a>
    {{Form::label('monto'.$numPrices, 'Precio',['class'=>'col-sm-2 control-label'])}}
    <div class="col-sm-2">
        {{ Form::text('monto'.$numPrices,'',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('monto'.$numPrices)}}</span>
    </div>
    {{Form::label('id_moneda'.$numPrices, 'Moneda',['class'=>'col-sm-2 control-label'])}}
    <div class="col-sm-2">
        <select name="id_moneda{{$numPrices}}" id="id_moneda{{$numPrices}}" class="form-control" > 
            <option value="">...........</option>
            @foreach($Moneda as $row)             
            <option value="{{$row->id}}">{{$row->simbolo}}</option>         
            @endforeach
        </select>                
        <span class="error">{{ $errors->first('id_moneda'.$numPrices)}}</span>
    </div>    
</div>

