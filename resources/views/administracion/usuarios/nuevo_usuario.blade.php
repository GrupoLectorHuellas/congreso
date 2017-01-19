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
            <h3 class="box-title">Nuevo Usuario del Sistema</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fanu"></div>
        <div class="box-body">
            <form  id="f_nuevo_usuario"  method="post"  action="{{action('UsuarioController@store')}}"  >
                {!!csrf_field()!!}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Nacionalidad</label>
                            <select class="form-control select2" name="nacionalidades" id="nacionalidades" style="width: 100%" >
                                <option value="Ecuatoriano" selected>Ecuatoriano</option>
                                <option value="Extranjero Residente">Extranjero Residente</option>
                                <option value="Extranjero No Residente">Extranjero No Residente</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Ocupacion</label>
                            <select class="form-control select2" style="width: 100%;" id ="ocupacion" name ="optradio">
                                    <option value="Estudiante" selected>Estudiante</option>
                                     <option value="Profesional" >Profesional</option>


                            </select>
                        </div>
                    </div>

                </div><!--Fin de row -->

                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label id ="label-dni" for ="identificacion">Identificación (Cédula)</label>
                            <input type="text" class="form-control"  id ="id" name="id" placeholder="Identificacion"   value="{{old("id") }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-control select2" style="width: 100%;" id ="rol" name ="id_roles">
                                <option value="" disabled selected>Seleccione el rol</option>
                                @if(Auth::user()->id_roles==2)
                                        @foreach($roles as $rol)
                                            @if($rol->id ==3)
                                                <option value="{{$rol->id}}" >  {{ $rol->nombre }} </option>
                                            @endif
                                        @endforeach
                                @else
                                    @foreach($roles as $rol)
                                        <option value="{{$rol->id}}" >  {{ $rol->nombre }} </option>

                                    @endforeach

                                @endif


                            </select>
                        </div>
                    </div>
                </div><!--Fin de row -->

                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="nombres">Nombres</label>
                            <input type="text" class="form-control" id="nombres"  name="nombres" placeholder="Nombres" onkeypress="return soloLetras(event)" maxlength="30" value="{{old("nombres") }}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" onkeypress="return soloLetras(event)" maxlength="30" value="{{old("apellidos")}}"  >
                        </div>
                    </div>
                </div><!--Fin de row -->

                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="genero">Genero</label>
                            <select class="form-control select2" style="width: 100%;"  name ="radio-genero">
                                    <option value="" disabled selected>Seleccione el genero</option>
                                    <option value="Masculino" >Masculino</option>
                                    <option value="Femenino" >Femenino</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" onkeypress="return soloNumeros(event)"  value="{{old("telefono") }}">
                        </div>
                    </div>
                </div><!--Fin de row -->

                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label id ="label-pais" for ="pais">País</label>
                            <input type="text" class="form-control" id="pais"  name="pais" placeholder="Pais"  maxlength="50" value="{{old("pais")}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion"  name="direccion" placeholder="Direccion"  maxlength="50" value="{{old("direccion")}}">
                        </div>
                    </div>
                </div><!--Fin de row -->

                <div class="row" id ="provincia"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12" >
                        <div class="form-group">
                            <label id ="label-provincia" >Provincia</label>
                            <select class="form-control select2" name="provincia" id="provincias"  >
                                <option value="" disabled selected>Seleccione la provincia</option>
                                @foreach($provincias as $provincia)
                                    <option value="{{$provincia->id}}">  {{ $provincia->nombre }} </option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 " id ="canton" >
                        <div class="form-group">
                            <label id ="label-canton">Cantón</label>
                            <select class="form-control select2" name="canton" id ="cantones" >
                                <option value="" disabled selected>Seleccione el canton</option>
                            </select>
                        </div>
                    </div>
                </div><!--Fin de row -->
                <div class="row" id="ciudad" style="display: none"><!--Inicio de row -->
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="ciudad_input">Ciudad</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad_input" value="{{old('ciudad')}}"  maxlength="50" >
                        </div>
                    </div>
                </div><!--Fin de row -->


                <div class="row" id ="facultad" ><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12"   >
                        <div class="form-group">
                            <label>Facultad</label>
                            <select class="form-control select2" name="facultad" id="facultades" style="width: 100%;" >
                                <option value="" disabled selected>Seleccione la facultad</option>
                                @foreach($facultades as $facultad)
                                    <option value="{{$facultad->id}}" >  {{ $facultad->nombre }} </option>
                                @endforeach


                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 " id ="carrera" >
                        <div class="form-group">
                            <label>Carrera</label>
                            <select class="form-control select2" name="carrera" id ="carreras" style="width: 100%;">
                                <option value="" disabled selected>Seleccione la carrera</option>
                            </select>
                        </div>
                    </div>
                </div><!--Fin de row -->
                <div class="row" id="titulo" style="display: none"><!--Inicio de row -->
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="titulo_input">Titulo</label>
                            <input type="text" class="form-control" name="titulo" id="titulo_input" value="{{old("titulo")}}"  maxlength="50" >
                        </div>
                    </div>
                </div><!--Fin de row -->

                <div class="row" ><!--Inicio de row -->
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email"  name="email" placeholder="Email" value="{{old("email")}}" >
                        </div>
                    </div>

                </div><!--Fin de row -->
                <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" value="{{old('password')}}" >
                    </div>
                </div>
                </div>

                <div class="box-footer col-xs-12 ">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>


            </form>
        </div>

    </div>


@endsection

@section('script')
    <script src="{{url('administration/dist/js/usuarios/java-usuario.js')}}"></script>
    <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>
@endsection





