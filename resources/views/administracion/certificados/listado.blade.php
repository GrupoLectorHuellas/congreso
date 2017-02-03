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
                    <h3 class="box-title">Certificados Registrados</h3>
                </div>
                <!-- /.box-header -->
            @if(count($certificados) >0)
                <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                                <th>Certificado</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($certificados as $certificado)
                                <tr data-id="{{$certificado->id}}">
                                    <td>{{$certificado->id}}</td>
                                    <td>{{$certificado->inscripcion->usuario->nombres}}</td>
                                    <td>{{$certificado->inscripcion->usuario->apellidos}}</td>
                                    <td>{{$certificado->inscripcion->usuario->email}}</td>
                                    <td>
                                        {!!link_to('administracion/certificados/'.$certificado->id_inscripciones.'', $title = 'Reporte Certificado', $attributes = ['class'=>'btn  btn-primary btn-xs'], $secure = null)!!}


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