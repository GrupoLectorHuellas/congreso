@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>Eventos<small>Editar</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Eventos</li>
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
            <h3 class="box-title">Editar Evento</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {{Form::model($evento, ['route' => ['eventos.update',$evento->id],'method'=>'PUT','files' => true ])}}
            <div id="msj-success" class="alert alert-success alert-dismissible aprobado" role="alert" style="display:none">
                <strong> Evento Agregado Correctamente.</strong>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
            <div class="form-group">
                {!! Form::label('Nombre') !!}
                {!! Form::text('nombre',null,['placeholder'=>'Nombre','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Descripción') !!}
                {!! Form::text('descripcion',null,['placeholder'=>'Descripcion','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Fecha Inicio') !!}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name ="fecha_inicio" value="{{$evento->fecha_inicio}}" >


                </div>
            </div>
            <div class="form-group">
                {!! Form::label('Fecha Finalizacion') !!}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask name ="fecha_fin" value="{{$evento->fecha_fin}}" >
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Precio Estudiante') !!}
                {!! Form::number('precio_estudiante',null,['placeholder'=>'Precio Estudiante','class'=>'form-control' ,'step' => 'any']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Precio Profesional') !!}
                {!! Form::number('precio_profesional',null,['placeholder'=>'Precio Profesional','class'=>'form-control', 'step' => 'any']) !!}
            </div>

            <div class="form-group">
                <label>Categoria</label>
                <select class="form-control select2" name="id_categorias" id="categorias" style="width: 100%;" >
                    <option value="" disabled selected>Seleccione la categoria</option>

                @foreach($categorias as $categoria)
                        @if($categoria->id == $evento->categoria->id)
                            <option value="{{$categoria->id}}" selected>  {{ $categoria->nombre }} </option>
                        @else
                            <option value="{{$categoria->id}}">  {{ $categoria->nombre }} </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Expositores</label>
                <select class="form-control select2" multiple="multiple" data-placeholder="Selecione los expositores" name ="expositores[]" style="width: 100%;">
                        <?php $array = array(); ?>
                        @foreach($evento->expositores as $expositor_propio)
                            <?php $array[] = $expositor_propio->id;?>
                        @endforeach
                        @foreach($expositores as $expositor)
                            @if(in_array($expositor->id,$array) )
                                <option value="{{$expositor->id}}" selected> {{ $expositor->nombres.' '.$expositor->apellidos }} </option>
                            @else
                                <option value="{{$expositor->id}}" > {{ $expositor->nombres.' '.$expositor->apellidos }} </option>
                            @endif
                        @endforeach

                </select>
            </div>


            <div class="form-group">
                {!!Form::label('Foto','Foto:')!!}
                {!!Form::file('path',['class'=>'form-control'])!!}
            </div>
            {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
    <script src="{{url('administration/dist/js/eventos/java-evento.js')}}"></script>
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
            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //Money Euro
            $("[data-mask]").inputmask();
        });
    </script>
@endsection





