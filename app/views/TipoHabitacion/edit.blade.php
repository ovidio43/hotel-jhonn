@extends('administracion')
@section('title')
NUEVO TIPO HABITACION
@stop
@section('content')
{{ Form::open(array('url' => 'administracion/tipo-habitacion/'.$TipoHabitacion->id,'method'=>'put','class'=>'form-horizontal')) }}   
<div class="form-group">
    {{Form::label('nombre', 'Nombre',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('nombre',$TipoHabitacion->nombre,['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('nombre')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('descripcion', 'Descripcion',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::textArea('descripcion',$TipoHabitacion->descripcion,['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('descripcion')}}</span>
    </div>
</div>
<!--  link para adicionar precios -->

<div class="form-group">
    <div class="col-sm-4">   
        <input type="hidden" value="{{count($TipoHabitacion->precio)}}" name="prices" id="prices">
        <a href="{{URL::to('administracion')}}/moneda" id="add-price" rel="0">
            <span class="glyphicon glyphicon-plus"></span> Adicionar precio
        </a>
        <span style="display: none;">Porcesando..</span>
    </div>
</div>
<!-------------------------------------------->

<?php $c = 1; ?>
@foreach($TipoHabitacion->precio as $rowPrice)
<div class="form-group">    
    <input type="hidden" value="{{ $rowPrice->id}}" name="id_precio{{$c}}">
    <a class="delete-price" href="{{URL::to('administracion')}}/tipo-habitacion/delete/price/{{$rowPrice->id}}"><span class="glyphicon glyphicon-remove"></span></a>
    <label class="col-sm-2 control-label" for="monto{{$c}}">Precio</label>    <div class="col-sm-2">
        <input type="text" id="monto{{$c}}" value="{{$rowPrice->monto}}" name="monto{{$c}}" class="form-control">        
        <span class="error"></span>
    </div>
    <label class="col-sm-2 control-label" for="id_moneda{{$c}}">Moneda</label>    <div class="col-sm-2">
        <select class="form-control" id="id_moneda{{$c}}" name="id_moneda{{$c}}"> 
            @foreach(Moneda::orderBy('nombre','asc')->get() as $rowMoneda)                                  
            <option value="{{$rowMoneda->id}}" {{ $rowPrice->id_moneda==$rowMoneda->id?'selected':''}}>{{$rowMoneda->simbolo}}</option>
            @endforeach            
        </select>                
        <span class="error"></span>
    </div>    
    <?php $c++; ?>
</div>
@endforeach
<div class="form-group" id="content-button">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Guardar',['class'=>'btn btn-default'])}}
    </div>
</div>
{{ Form::close() }}

@stop
