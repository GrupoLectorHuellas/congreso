<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">

<div class="form-group">
    {!! Form::label('Abreviatura Titulo') !!}
    {!! Form::text('abreviatura',null,['placeholder'=>'Abreviatura','class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('Nombres') !!}
    {!! Form::text('nombre',null,['placeholder'=>'Nombres','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>

<div class="form-group">
    {!! Form::label('Apellidos') !!}
    {!! Form::text('apellidos',null,['placeholder'=>'Apellidos','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>

<div class="form-group">
    {!!Form::label('Foto','Foto:')!!}
    {!!Form::file('path')!!}
</div>