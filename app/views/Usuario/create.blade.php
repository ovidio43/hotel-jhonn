@extends('sistema')
@section('title')
NUEVO USUARIO
@stop
@section('content')
{{ Form::open(array('url' => 'sistema/usuario','class'=>'form-horizontal')) }}
<div class="form-group">
    {{Form::label('email', 'Email',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::text('email','',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('email')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('password', 'Contraseña',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        {{ Form::password('password',['class'=>'form-control'])}}
        <span class="error">{{ $errors->first('password')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('id_trabajador', 'Trabajador',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        <select name="id_trabajador" class="form-control" >   
            <option value="">ELEGIR</option>
            @foreach(Trabajador::where('acitvo','=','1')->orderBy('nombre','asc')->get() as $row)             
            <option value="{{$row->id}}">{{$row->nombre.' '.$row->apellidoP.' '.$row->apellidoM.' '.$row->activo}}</option>         
            @endforeach
        </select>
        <span class="error">{{ $errors->first('id_trabajador')}}</span>
    </div>
</div>
<div class="form-group">
    {{Form::label('id_tipo_usuario', 'Tipo',['class'=>'col-sm-3 control-label'])}}
    <div class="col-sm-4">
        <select name="id_tipo_usuario" class="form-control" > 
            <option value="">ELEGIR</option>
            @foreach(TipoUsuario::orderBy('nombre','asc')->get() as $row)             
             <option value="{{$row->id}}">{{$row->nombre}}</option>         
            @endforeach
        </select>               
        <span class="error">{{ $errors->first('id_tipo_usuario')}}</span>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Guardar',['class'=>'btn btn-default'])}}
    </div>
</div>
{{ Form::close() }}
@stop
