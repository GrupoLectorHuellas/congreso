<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">

<div class="form-group">
    {!! Form::label('Fecha') !!}
    <div class="input-group">
        <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
        </div>
        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name ="fecha" value="{{$date}}" disabled>
    </div>
</div>

<div class="form-group">
    <label>Usuario</label>
    <select class="form-control select2" name="usuario_id" id="usuarios" style="width: 100%;" >
        <option value="" disabled selected>Seleccione el usuario</option>
        @foreach($usuarios as $usuario)
            <option value="{{$usuario->id}}" >  {{ $usuario->nombres.' '.$usuario->apellidos }} </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Evento</label>
    <select class="form-control select2" name="evento_id" id="eventos" style="width: 100%;" >
        <option value="" disabled selected>Seleccione el evento</option>

    </select>
</div>
