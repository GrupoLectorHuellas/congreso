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
                    <h3 class="box-title">Inscripciones Registradas</h3>
                </div>
                <!-- /.box-header -->
                @if(count($inscripciones) >0)
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>Evento</th>
                                    <th>Validado</th>
                                    <th>Eliminar</th>
                                    <th>Editar</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inscripciones as $inscripcion)
                                    <tr data-id="{{$inscripcion->id}}">
                                        <td>{{$inscripcion->id}}</td>
                                        <td>{{$inscripcion->fecha}}</td>
                                        <td>{{$inscripcion->usuario->nombres.' '.$inscripcion->usuario->apellidos}}</td>
                                        <td>{{$inscripcion->evento->nombre}}</td>
                                        @if($inscripcion->validado==0)
                                        <td><span class="label label-danger">No Validado</span></td>
                                        @else
                                            <td><span class="label label-success">Validado</span></td>
                                        @endif

                                        <td>
                                            <button type="button" class="btn btn-danger btn-xs btn-delete"  ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Eliminar</button>
                                        </td>
                                        <td>
                                            {!!link_to_route('inscripciones.edit', $title = 'Editar', $parameters = $inscripcion->id, $attributes = ['class'=>'btn  btn-primary btn-xs'])!!}

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div>
                @endif
            </div>
            <!-- /.box -->
        </div>

    {!! Form::open(['route' => ['inscripciones.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection
@section('script')
    <script src="{{url('administration/dist/js/inscripciones/java-inscripcion.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection