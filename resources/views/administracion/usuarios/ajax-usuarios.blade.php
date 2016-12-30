<div class="box-body table-responsive no-padding" >
    <table class="table table-hover" >
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Ciudad</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Ocupación</th>
            <th>Acción</th>
        </tr>
        @foreach($usuarios as $usuario)
            <tr>
                <td class="sorting_1">{{$usuario->id}}</td>
                <td><i class="fa fa-user"></i>&nbsp;&nbsp{{$usuario->nombres." ".$usuario->apellidos}}</td>
                <td>{{$usuario->ciudad}}</td>
                <td>{{$usuario->telefono}}</td>
                <td>{{$usuario->email}}</td>
                @if($usuario->titulo =="")
                    <td>Estudiante</td>
                @else
                    <td>Profesional</td>
                @endif
                <td>
                {!!link_to_route('usuarios.edit', $title = 'Editar', $parameters = $usuario->id, $attributes = ['class'=>'btn  btn-primary btn-sm'])!!}
                <button type="button" class="btn btn-danger btn-sm btn-delete"  ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Eliminar</button>
                </td>

            </tr>
        @endforeach





    </table>
    {{$usuarios->links()}}
</div>