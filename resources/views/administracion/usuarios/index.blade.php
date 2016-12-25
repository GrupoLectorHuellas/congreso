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
@section('title-panel')

@endsection
@section('contenido')
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
    <script src="{{url('administration/dist/js/administration/java-usuario.js')}}"></script>
@endsection