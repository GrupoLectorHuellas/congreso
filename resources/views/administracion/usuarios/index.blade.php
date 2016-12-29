@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Inicio
            <small>Listar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Inicio</li>
        </ol>
    </section>
@endsection

@section('contenido')
    @if (session('mensaje-registro'))
        @include('mensajes.msj_correcto')
    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Usuarios Registrados</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                @if(count($usuarios) >0)
                    <div class="ajax-tabla">
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
                                    {!!link_to_route('usuarios.edit', $title = 'Eliminar', $parameters = $usuario->id, $attributes = ['class'=>'btn  btn-danger btn-sm'])!!}

                                </td>

                            </tr>
                        @endforeach
                    </table>
                    {{$usuarios->links()}}
                </div>
                    </div>
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div>
                @endif
            </div>
            <!-- /.box -->
        </div>
    </div>


@endsection
@section('script')
    <script src="{{url('administration/dist/js/usuarios/java-usuario.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>
@endsection