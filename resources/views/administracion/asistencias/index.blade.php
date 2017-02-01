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
                    <h3 class="box-title">Asistencias Registradas</h3>
                </div>
                <!-- /.box-header -->
                @if(count($asistencias) >0)
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>Evento</th>
                                    <th>Editar</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($asistencias as $asistencia)
                                    <tr data-id="{{$asistencia->id}}">
                                        <td>{{$asistencia->id}}</td>
                                        <td>{{$asistencia->fecha}}</td>
                                        <td>{{$asistencia->inscripciones->usuario->id}}</td>
                                        <td>{{$asistencia->inscripciones->evento->nombre}}</td>

                                        <td>
                                            {!!link_to_route('asistencias.edit', $title = 'Editar', $parameters = $asistencia->id, $attributes = ['class'=>'btn  btn-primary btn-xs'])!!}

                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ninguna asistencia...</label>  </div>
                @endif
            </div>
            <!-- /.box -->
        </div>

    {!! Form::open(['route' => ['asistencias.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection
@section('script')
    <script src="{{url('administration/dist/js/asistencias/java-asistencia.js')}}"></script>
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