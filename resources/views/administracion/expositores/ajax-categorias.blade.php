<div class="box-body table-responsive no-padding" >
    <table class="table table-hover" >
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descipción</th>
            <th>Acción</th>
        </tr>
        @foreach($categorias as $categoria)
            <tr data-id="{{$categoria->id}}">
                <td class="sorting_1">{{$categoria->id}}</td>
                <td>{{$categoria->nombre}}</td>
                <td>{{$categoria->descripcion}}</td>
                <td>
                    {!!link_to_route('categorias.edit', $title = 'Editar', $parameters = $categoria->id, $attributes = ['class'=>'btn  btn-primary btn-sm'])!!}
                    <button type="button" class="btn btn-danger btn-sm btn-delete"  ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Eliminar</button>

                </td>

            </tr>
        @endforeach
    </table>
    {{$categorias->links()}}
</div>