<h4>    
    <a href="{{URL::to('sistema/parametros/moneda')}}" class="get-list">
        <span class="label label-primary">Volver a Listado </span>  
    </a>
</h4>
{{ Form::open(array('url' => 'sistema/parametros/moneda/'.$Moneda->id,'method'=>'put','class'=>'form-horizontal form-new-item')) }}   
<div class="form-group">
    {{Form::label('nombre', 'Nombre',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('nombre',$Moneda->nombre,['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('nombre')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('pais', 'País',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('pais',$Moneda->pais,['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('pais')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('simbolo', 'Símbolo',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('simbolo',$Moneda->simbolo,['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('simbolo')}}</span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Guardar',['id'=>'btn-submit', 'class'=>'btn btn-default'])}}
    </div>
</div>


