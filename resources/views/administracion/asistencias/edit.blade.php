@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>Asistencias<small>Editar</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Asistencias</li>
            <li class="active">Editar</li>
        </ol>
    </section>
@endsection
@section('contenido')
    @if (session('mensaje-registro'))
        @include('mensajes.msj_correcto')
    @endif
    @if(!$errors->isEmpty())
        <div class="alert alert-danger">
            <p><strong>Error!! </strong>Corrija los siguientes errores</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Editar Asistencias</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {{Form::model($asistencia, ['route' => ['asistencias.update',$asistencia->id],'method'=>'PUT','files' => true ])}}
            <div id="msj-success" class="alert alert-success alert-dismissible aprobado" role="alert" style="display:none">
                <strong> Asistencia Agregada Correctamente.</strong>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">

            <div class="form-group">
                <label>Inscripción</label>
                <select class="form-control select2" name="id_asistencia" id="inscripciones" style="width: 100%;" >
                    
                    @foreach($inscripciones as $inscripcion)
                        <option value="{{$inscripcion->id}}" >  {{ $inscripcion->usuario_id }} </option>
                    @endforeach
                </select>
            </div>

          

            <div class="form-group">
                {!! Form::label('Fecha Asistencia') !!}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>

                    <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name ="fecha" value="{{old('fecha')}}">
                </div>
            </div>

            <div class="bootstrap-timepicker">
                            <div class="form-group">
                            {!! Form::label('Hora Asistencia') !!}

                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name ="hora">

                                <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                            <!-- /.input group -->
                            </div>
                        <!-- /.form group -->
                    </div>

            {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
    <script src="{{url('administration/dist/js/asistencias/java-asistencia.js')}}"></script>
    <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>
    <script src="{{url('administration/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{url('administration/plugins/iCheck/icheck.min.js')}}"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //Money Euro
            $("[data-mask]").inputmask();

              //Timepicker
            $(".timepicker").timepicker({
            showInputs: false
            });
        });
        
    </script>
@endsection
