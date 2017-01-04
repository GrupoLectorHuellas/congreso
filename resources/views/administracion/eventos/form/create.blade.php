<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
<div class="form-group">
    {!! Form::label('Nombre') !!}
    {!! Form::text('nombre',null,['placeholder'=>'Nombres','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>
<div class="form-group">
    {!! Form::label('Descripción') !!}
    {!! Form::text('descripcion',null,['placeholder'=>'Apellidos','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>
<div class="form-group">
    {!! Form::label('Fecha') !!}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name ="fecha">
    </div>
</div>

<div class="form-group">
    {!!Form::label('Foto','Foto:')!!}
    {!!Form::file('path')!!}
</div>