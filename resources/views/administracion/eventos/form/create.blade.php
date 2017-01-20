<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
<div class="form-group">
    {!! Form::label('Nombre') !!}
    {!! Form::text('nombre',null,['placeholder'=>'Nombre','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>
<div class="form-group">
    {!! Form::label('Descripción') !!}
    {!! Form::text('descripcion',null,['placeholder'=>'Descripcion','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
</div>
<div class="form-group">
    {!! Form::label('Fecha Inicio') !!}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>

        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name ="fecha_inicio" value="{{old('fecha_inicio')}}">
    </div>
</div>
<div class="form-group">
    {!! Form::label('Fecha Finalizacion') !!}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name ="fecha_fin" value="{{old('fecha_fin')}}">
    </div>
</div>

<div class="form-group">
    {!! Form::label('Precio Estudiante') !!}
    {!! Form::number('precio_estudiante',null,['placeholder'=>'Precio Estudiante','class'=>'form-control' ,'step' => 'any']) !!}
</div>

<div class="form-group">
    {!! Form::label('Precio Profesional') !!}
    {!! Form::number('precio_profesional',null,['placeholder'=>'Precio Profesional','class'=>'form-control', 'step' => 'any']) !!}
</div>

<div class="form-group">
    <label>Categoria</label>
    <select class="form-control select2" name="id_categorias" id="categorias" style="width: 100%;" >
        <option value="" disabled selected>Seleccione la categoria</option>
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}" >  {{ $categoria->nombre }} </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {!!Form::label('Foto','Foto:')!!}
    {!!Form::file('path',['class'=>'form-control'])!!}
</div>