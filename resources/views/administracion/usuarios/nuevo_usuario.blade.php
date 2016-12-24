@extends('layouts.admin')
@section('title')
    <section class="content-header">

        <h1>
            Usuario
            <small>Agregar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Usuarios</li>
            <li class="active">Agregar</li>
            <li class="active">Agregar</li>
        </ol>
    </section>
@endsection

@section('contenido')

    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Nuevo Usuario del Sistema</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fanu"></div>
        <div class="box-body">
            <form  id="f_nuevo_usuario"  method="post"  action="agregar_nuevo_usuario"  >
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Ocupacion</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option value="" disabled selected>Seleccione la ocupación</option>
                                <option value="Estudiante">Estudiante</option>
                                <option value="Profesional">Profesional</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="cedula">Cedula</label>
                            <input type="text" class="form-control"  id ="cedula" name="cedula" placeholder="Cedula" >
                        </div>
                    </div>
                </div><!--Fin de row -->

                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres"  name="nombres" placeholder="Nombres" >
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" >
                        </div>
                    </div>
                </div><!--Fin de row -->
                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" class="form-control" id="ciudad"  name="ciudad" placeholder="Ciudad" >
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" >
                        </div>
                    </div>
                </div><!--Fin de row -->
                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12" id ="facultad">
                        <div class="form-group">
                            <label>Titulo</label>
                            <select class="form-control select2" name="facultad" id="facultades" style="width: 100%;">
                                <option value="" disabled selected>Seleccione la facultad</option>
                                @foreach($facultades as $facultad)
                                    <option value="{{$facultad->id}}"> {{ $facultad->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 " id ="carrera">
                        <div class="form-group">
                            <label>Carrera</label>
                            <select class="form-control select2" name="carrera"  style="width: 100%;">
                                <option value="" disabled selected>Seleccione la carrera</option>
                            </select>
                        </div>
                    </div>
                </div><!--Fin de row -->
                <div class="row" id="titulo" style="display:none;"><!--Inicio de row -->
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="titulo_input">Titulo</label>
                            <input type="text" class="form-control" name="titulo" id="titulo_input" value="{{old('titulo')}}" >
                        </div>
                    </div>

                </div><!--Fin de row -->
                <div class="row" ><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email"  name="email" placeholder="Email" >
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Contraseña" >
                        </div>
                    </div>
                </div><!--Fin de row -->


                <div class="box-footer col-xs-12 ">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>


            </form>
        </div>

    </div>


@endsection

@section('script')
    <script src="{{url('administration/dist/js/administration/java-usuario.js')}}"></script>
@endsection





