<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
<div class="form-group">
    {!! Form::label('Cedula') !!}
    {!! Form::text('id',null,['placeholder'=>'Cedula','class'=>'form-control','onkeypress'=>'return soloNumeros(event)']) !!}
</div>
<div class="form-group">
    {!! Form::label('Nombres') !!}
    {!! Form::text('nombres',null,['placeholder'=>'Nombres','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>
<div class="form-group">
    {!! Form::label('Apellidos') !!}
    {!! Form::text('apellidos',null,['placeholder'=>'Apellidos','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>
<div class="form-group">
    {!! Form::label('Titulo') !!}
    {!! Form::text('titulo',null,['placeholder'=>'Titulo','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>
<div class="form-group">
    {!! Form::label('Email') !!}
    {!! Form::email('email',null,['placeholder'=>'Email','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>
<div class="form-group">
    {!! Form::label('Experiencia Laborarl') !!}
    {!! Form::textarea('experiencia_laboral',null,['placeholder'=>'Experiencia Laboral','class'=>'form-control','onkeypress'=>'return soloLetras(event)','size' => '30x4']) !!}
</div>
<div class="form-group">
    {!!Form::label('Foto','Foto:')!!}
    {!!Form::file('path')!!}
</div>