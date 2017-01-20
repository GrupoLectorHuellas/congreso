<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
<div class="form-group">
    {!! Form::label('Tema Unidad') !!}
    {!! Form::text('nombre',null,['placeholder'=>'Temario','class'=>'form-control']) !!}
</div>


<div class="form-group">
    <label>Evento</label>
    <select class="form-control select2" name="id_temario" id="eventos" style="width: 100%;" >
        <option value="" disabled selected>Seleccione el evento</option>
        @foreach($eventos as $evento)
            <option value="{{$evento->id}}" >  {{ $evento->nombre }} </option>
        @endforeach
    </select>
</div>