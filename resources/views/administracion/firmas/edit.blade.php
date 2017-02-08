@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>Firmas<small>Agregar</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Firmas</li>
            <li class="active">Agregar</li>
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
            <h3 class="box-title">Nueva Firma</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {{Form::model($firma, ['route' => ['firmas.update',$firma->id],'method'=>'PUT','files' => true ])}}
            <div id="msj-success" class="alert alert-success alert-dismissible aprobado" role="alert" style="display:none">
                <strong> Firma Agregada Correctamente.</strong>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">

                <div class="form-group">
                    {!! Form::label('Abreviatura Titulo') !!}
                    {!! Form::text('abreviatura',null,['placeholder'=>'Abreviatura','class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Nombres') !!}
                    {!! Form::text('nombre',null,['placeholder'=>'Nombres','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Apellidos') !!}
                    {!! Form::text('apellidos',null,['placeholder'=>'Apellidos','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                </div>

                 <div class="form-group">
                <label>Eventos</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Selecione los eventos" name ="eventos[]" style="width: 100%;">
                        <?php $array = array(); ?>
                        @foreach($firma->eventos as $evento_propio)
                            <?php $array[] = $evento_propio->id;?>
                        @endforeach
                        @foreach($eventos as $evento)
                            @if(in_array($evento->id,$array) )
                                <option value="{{$evento->id}}" selected> {{ $evento->nombre }} </option>
                            @else
                                <option value="{{$evento->id}}" > {{ $evento->nombre }} </option>
                            @endif
                        @endforeach

                </select>
            </div>

                <div class="form-group">
                    {!!Form::label('Foto','Foto:')!!}
                    {!!Form::file('path')!!}
                </div>
            <!--
            @include('administracion.firmas.form.create')

            -->
            {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
    <script src="{{url('administration/dist/js/firmas/java-firmas.js')}}"></script>
    <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>
    <script src="{{url('administration/plugins/select2/select2.full.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>

     <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
            
        });
    </script>
@endsection