<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
<div class="form-group">
    <label>Temario</label>
    <select class="form-control select2" name="id_contenido" id="temarios" style="width: 100%;" >
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


    