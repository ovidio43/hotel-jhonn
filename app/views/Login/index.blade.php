
{{ Form::open(array('url' => 'login','class'=>'form-horizontal')) }}
{{Form::label('login', 'Login',['class'=>'col-sm-3 control-label'])}}
{{ Form::text('login','',['class'=>'form-control'])}}<br>
{{Form::label('password', 'Contraseña',['class'=>'col-sm-3 control-label'])}}
{{ Form::password('password',['class'=>'form-control'])}}<br>
{{ Form::submit('Entrar',['class'=>'btn btn-default'])}}
{{ Form::close() }}


