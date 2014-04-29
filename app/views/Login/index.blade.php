
{{ Form::open(array('url' => 'login','class'=>'form-horizontal')) }}
{{Form::label('email', 'Email',['class'=>'col-sm-3 control-label'])}}
{{ Form::text('email','',['class'=>'form-control'])}}<br>
{{Form::label('password', 'Contraseña',['class'=>'col-sm-3 control-label'])}}
{{ Form::password('password',['class'=>'form-control'])}}<br>
{{ Form::submit('Entrar',['class'=>'btn btn-default'])}}
{{ Form::close() }}


