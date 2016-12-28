@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Usuarios
            <small>Editar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Usuarios</li>
            <li class="active">Editar</li>
        </ol>
    </section>
@endsection

@section('contenido')

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
            <h3 class="box-title">Nuevo Usuario del Sistema</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fanu"></div>
        <div class="box-body">
            <form  id="f_nuevo_usuario"  method="post"  action="{{action('UsuarioController@store')}}"  >
                {!!csrf_field()!!}
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Ocupacion</label>
                            <select class="form-control select2" style="width: 100%;" id ="ocupacion" name ="ocupacion">
                                @if($usuario->titulo =="")
                                <option value="Estudiante" selected >Estudiante</option>
                                <option value="Profesional">Profesional</option>
                                @else
                                <option value="Profesional" selected>Profesional</option>
                                <option value="Estudiante" >Estudiante</option>
                                 @endif

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="cedula">Cedula</label>
                            <input type="text" class="form-control"  id ="cedula" name="cedula" placeholder="Cedula" onkeypress="return soloNumeros(event)" maxlength="10" value="{{$usuario->id }}">
                        </div>
                    </div>
                </div><!--Fin de row -->

                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres"  name="nombres" placeholder="Nombres" onkeypress="return soloLetras(event)" maxlength="30" value="{{$usuario->nombres }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" onkeypress="return soloLetras(event)" maxlength="30" value="{{$usuario->apellidos }}" >
                        </div>
                    </div>
                </div><!--Fin de row -->
                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" class="form-control" id="ciudad"  name="ciudad" placeholder="Ciudad" onkeypress="return soloLetras(event) " maxlength="30" value="{{$usuario->ciudad}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" onkeypress="return soloNumeros(event)" maxlength="10" value="{{$usuario->telefono }}">
                        </div>
                    </div>
                </div><!--Fin de row -->
                @if($usuario->titulo =="")
                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12" id ="facultad"  >
                        <div class="form-group">
                            <label>Facultad</label>
                            <select class="form-control select2" name="facultad" id="facultades" style="width: 100%;" >
                                <option value="" disabled selected>Seleccione la facultad</option>


                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 " id ="carrera" >
                        <div class="form-group">
                            <label>Carrera</label>
                            <select class="form-control select2" name="carrera" id ="carreras" style="width: 100%;">
                                    <option value="" disabled selected> {{$usuario->carrera->nombre}}</option>

                            </select>
                        </div>
                    </div>
                @else
                </div><!--Fin de row -->
                <div class="row" id="titulo" ><!--Inicio de row -->
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="titulo_input">Titulo</label>
                            <input type="text" class="form-control" name="titulo" id="titulo_input" value="{{old('titulo')}}"  maxlength="50" >
                        </div>
                    </div>
                @endif
                </div><!--Fin de row -->
                <div class="row" ><!--Inicio de row -->
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email"  name="email" placeholder="Email" value="{{$usuario->email }}" >
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
    <script src="{{url('administration/dist/js/usuarios/java-usuario.js')}}"></script>
@endsection