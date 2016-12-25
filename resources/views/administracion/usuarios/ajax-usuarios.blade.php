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
                <td "><i class="fa fa-user"></i>&nbsp;&nbsp{{$usuario->nombres." ".$usuario->apellidos}}</td>
                <td>{{$usuario->ciudad}}</td>
                <td>{{$usuario->telefono}}</td>
                <td>{{$usuario->email}}</td>
                @if($usuario->titulo =="")
                    <td>Estudiante</td>
                @else
                    <td>Profesional</td>
                @endif
                <td><button class="btn  btn-skin-green btn-xs" onclick="mostrarficha(<?= $usuario->id; ?>);" ><i class="fa fa-fw fa-eye"></i>Ver</button></td>


            </tr>
        @endforeach





    </table>
    {{$usuarios->links()}}
</div>