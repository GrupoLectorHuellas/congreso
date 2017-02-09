<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
<div class="form-group">
    <label>Temario</label>
    <select class="form-control select2" name="id_temarios" id="temarios" style="width: 100%;" >
        <option value="" disabled selected>Seleccione el temario</option>
        @foreach($temarios as $temario)
            <option value="{{$temario->id}}" >  {{ $temario->nombre }} </option>
        @endforeach
    </select>
</div>



  <div class="form-group">
        {!! Form::label('Subtemas') !!}
        <textarea name='subtemas' class="form-control" rows="3" placeholder="Subtemas ..."></textarea>
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



    