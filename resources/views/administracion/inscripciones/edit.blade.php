@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>Inscripción<small>Editar</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Inscripción</li>
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
            <h3 class="box-title">Editar Inscripción</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {{Form::model($inscripcion, ['route' => ['inscripciones.update',$inscripcion->id],'method'=>'PUT','files' => true ])}}
            <div id="msj-success" class="alert alert-success alert-dismissible aprobado" role="alert" style="display:none">
                <strong> Evento Agregado Correctamente.</strong>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">

            <div class="form-group">
                {!! Form::label('Fecha') !!}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name ="fecha" value="{{$date}}" disabled>
                </div>
            </div>

            <div class="form-group">
                <label>Usuario</label>
                <select class="form-control select2" name="usuario_id" id="usuarios" style="width: 100%;" >
                        <option value="{{$inscripcion->usuario->id}}" >  {{ $inscripcion->usuario->nombres.' '.$inscripcion->usuario->apellidos }}</option>
                </select>
            </div>

            <div class="form-group">
                <label>Evento</label>
                <select class="form-control select2" name="evento_id" id="eventos" style="width: 100%;" >
                    <option value="{{$inscripcion->evento->id}}" selected >  {{ $inscripcion->evento->nombre }} </option>

                </select>
            </div>

            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label>Validar Inscripción</label>
                        @if($inscripcion->validado==0)
                            <label for=""> <input type="checkbox" class="flat-red" value ="validar" name="validar"></label>
                        @else
                            <label for=""> <input type="checkbox" class="flat-red" value ="validar" name="validar" checked></label>
                        @endif

                    </div>
                </div>
            </div>

            {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
    <script src="{{url('administration/dist/js/inscripciones/java-inscripcion.js')}}"></script>
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
        });
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    </script>
@endsection





