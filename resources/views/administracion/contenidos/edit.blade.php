@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>Contenidos<small>Editar</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Contenidos</li>
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
            <h3 class="box-title">Editar Contenido</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {{Form::model($contenido, ['route' => ['contenidos.update',$contenido->id],'method'=>'PUT','files' => true ])}}
            <div id="msj-success" class="alert alert-success alert-dismissible aprobado" role="alert" style="display:none">
                <strong> Contenido Agregado Correctamente.</strong>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                <div class="form-group">
                    <label>Temario</label>
                    <select class="form-control select2" name="id_contenido" id="temarios" style="width: 100%;" >
                        <option value="" disabled selected>Seleccione el temario</option>
                        @foreach($temarios as $temario)
                            <option value="{{$temario->id}}" >  {{ $temario->nombre }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    {!! Form::label('Subtemas') !!}
                    {!! Form::text('subtemas',null,['placeholder'=>'Subtemas','class'=>'form-control']) !!}
                </div>

                <!-- time Picker -->
                    <div class="bootstrap-timepicker">
                            <div class="form-group">
                            {!! Form::label('Hora Inicio') !!}

                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name ="hora_inicio">

                                <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                            <!-- /.input group -->
                            </div>
                        <!-- /.form group -->
                    </div>

                    <div class="bootstrap-timepicker">
                            <div class="form-group">
                            {!! Form::label('Hora Fin') !!}

                            <div class="input-group">
                                <input type="text" class="form-control timepicker" name ="hora_fin">

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
    <script src="{{url('administration/dist/js/contenidos/java-contenido.js')}}"></script>
    <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>

    <script>
        $(function () {
            
            //Timepicker
            $(".timepicker").timepicker({
            showInputs: false
            });

        });
    </script>
    
@endsection