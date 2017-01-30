<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
<div class="form-group">
    <label>Inscripción</label>
    <select class="form-control select2" name="id_asistencia" id="inscripciones" style="width: 100%;" >
        <option value="" disabled selected>Buscar Usuario</option>
        @foreach($inscripciones as $inscripcion)
            <option value="{{$inscripcion->id}}" >  {{ $inscripcion->usuario_id }} </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('Fecha Asistencia') !!}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>

        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name ="fecha" value="{{old('fecha')}}">
    </div>
</div>