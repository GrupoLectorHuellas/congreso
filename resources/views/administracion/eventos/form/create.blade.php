<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
<div class="form-group">
    {!! Form::label('Nombre') !!}
    {!! Form::text('nombre',null,['placeholder'=>'Nombre','class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Descripción') !!}
    {!! Form::text('descripcion',null,['placeholder'=>'Descripcion','class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Fecha Inicio') !!}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" id="datepicker" name = "fecha_inicio" value="{{old('fecha_inicio')}}">
    </div>
</div>
<div class="form-group">
    {!! Form::label('Fecha Fin') !!}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control pull-right" id="datepicker2" name = "fecha_fin" value="{{old('fecha_fin')}}">
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
        <label>Expositores</label>
        <select class="form-control select2" multiple="multiple" data-placeholder="Selecione los expositores" name ="expositores[]" style="width: 100%;">
            @foreach($expositores as $expositor)
                <option value="{{$expositor->id}}" >  {{ $expositor->nombres.' '.$expositor->apellidos }} </option>
            @endforeach
        </select>
</div>

<div class="form-group">
        <label>Firmas</label>
        <select class="form-control select2" multiple="multiple" data-placeholder="Selecione las firmas" name ="firmas[]" style="width: 100%;">
            @foreach($firmas as $firma)
                <option value="{{$firma->id}}" >  {{ $firma->abreviatura. ' ' .$firma->nombre.' '.$firma->apellidos }} </option>
            @endforeach
        </select>
</div>



<div class="form-group">
    {!!Form::label('Foto','Foto:')!!}
    {!!Form::file('path',['class'=>'form-control'])!!}
</div>