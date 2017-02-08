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
        <label>Eventos</label>
        <select class="form-control select2" multiple="multiple" data-placeholder="Selecione los eventos" name ="eventos[]" style="width: 100%;">
            @foreach($eventos as $evento)
                <option value="{{$evento->id}}" >  {{ $evento->nombre }} </option>
            @endforeach
        </select>
</div>

<div class="form-group">
    {!!Form::label('Foto','Foto:')!!}
    {!!Form::file('path')!!}
</div>