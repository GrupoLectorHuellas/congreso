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
    {!! Form::label('Fecha Inicio') !!}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name ="fecha_inicio">
    </div>
</div>
<div class="form-group">
    {!! Form::label('Fecha Finalizacion') !!}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name ="fecha_fin">
    </div>
</div>
<div class="form-group">
    {!! Form::label('Precio') !!}
    {!! Form::number('precio',null,['class'=>'form-control','placeholder'=>'Precio']) !!}
</div>

<div class="form-group">
    {!!Form::label('Foto','Foto:')!!}
    {!!Form::file('path')!!}
</div>