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
            <h3 class="box-title">Edición de Usuario</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fanu"></div>
        <div class="box-body">
            {{Form::model($usuario, ['route' => ['usuarios.update',$usuario->id],'method'=>'PUT', 'id'=>'formdata','files' => true, ])}}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Nacionalidad</label>
                            <select class="form-control select2" style="width: 100%;" name="nacionalidades" id="nacionalidades">
                                @if($usuario->nacionalidad =="Ecuatoriano")
                                    <option value="Ecuatoriano" selected >Ecuatoriano</option>
                                    <option value="Extranjero Residente">Extranjero Residente</option>
                                    <option value="Extranjero No Residente">Extranjero No Residente</option>
                                @elseif($usuario->nacionalidad =="Extranjero Residente")
                                    <option value="Ecuatoriano"  >Ecuatoriano</option>
                                    <option value="Extranjero Residente" selected>Extranjero Residente</option>
                                    <option value="Extranjero No Residente">Extranjero No Residente</option>
                                @elseif($usuario->nacionalidad =="Extranjero No Residente")
                                    <option value="Ecuatoriano"  >Ecuatoriano</option>
                                    <option value="Extranjero Residente" >Extranjero Residente</option>
                                    <option value="Extranjero No Residente" selected>Extranjero No Residente</option>
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label>Ocupacion</label>
                            <select class="form-control select2" style="width: 100%;" id ="ocupacion" name ="optradio">
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

                </div><!--Fin de row -->

            <div class="row"><!--Inicio de row -->
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label id ="label-dni" for ="identificacion">Identificación (Cédula)</label>
                        <input type="text" class="form-control"  id ="id" name="id" placeholder="Identificacion"   value="{{$usuario->id }}">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <select class="form-control select2" style="width: 100%;" id ="rol" name ="id_roles">
                            @foreach($roles as $rol)
                                @if($rol->id == $usuario->rol->id)
                                    <option value="{{$rol->id}}" selected>  {{ $rol->nombre }} </option>
                                @else
                                    <option value="{{$rol->id}}">  {{ $rol->nombre }} </option>
                                @endif
                            @endforeach

                        </select>
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
                        <label for="genero">Genero</label>
                        <select class="form-control select2" style="width: 100%;"  name ="radio-genero">
                            @if($usuario->genero=="Masculino")
                                <option value="Masculino" selected>{{ $usuario->genero }}</option>
                                <option value="Femenino">Femenino</option>
                            @elseif($usuario->genero=="Femenino")
                                <option value="Masculino" >Masculino </option>
                                <option value="Femenino" selected>{{ $usuario->genero }}</option>
                            @endif

                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" onkeypress="return soloNumeros(event)" maxlength="10" value="{{$usuario->telefono }}">
                    </div>
                </div>
            </div><!--Fin de row -->

                <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label id ="label-pais" for ="pais">País</label>
                            <input type="text" class="form-control" id="pais"  name="pais" placeholder="Pais"  maxlength="50" value="{{$usuario->pais}}">
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion"  name="direccion" placeholder="Direccion"  maxlength="50" value="{{$usuario->direccion}}">
                        </div>
                    </div>
                </div><!--Fin de row -->
                <!--Inicio condicion canton-->
            @if($usuario->nacionalidad!="Extranjero No Residente")
                @if($usuario->id_cantones!=null)
                <div class="row" id ="provincia"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12"  >
                        <div class="form-group">
                            <label id ="label-provincia" >Provincia</label>
                            <select class="form-control select2" name="provincia" id="provincias" style="width: 100%;" >
                                @foreach($provincias as $provincia)
                                    @if($provincia->id == $usuario->canton->provincia->id)
                                        <option value="{{$provincia->id}}" selected>  {{ $provincia->nombre }} </option>
                                    @else
                                        <option value="{{$provincia->id}}">  {{ $provincia->nombre }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 " id ="canton" >
                        <div class="form-group">
                            <label id ="label-canton">Cantón</label>
                            <select class="form-control select2" name="canton" id ="cantones" style="width: 100%;">

                            @foreach($usuario->canton->cantones($usuario->canton->provincia->id) as $canton)

                                    @if($canton->id == $usuario->canton->id)
                                        <option value="{{$canton->id}}" selected>  {{ $canton->nombre }} </option>
                                    @else
                                        <option value="{{$canton->id}}">  {{ $canton->nombre }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div><!--Fin de row -->
                @endif

            @else
                <div class="row" id="ciudad" ><!--Inicio de row -->
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="ciudad_input">Ciudad</label>
                            <input type="text" class="form-control" name="ciudad" id="ciudad_input" value="{{$usuario->ciudad}}"  maxlength="50" >
                        </div>
                    </div>
                </div><!--Fin de row -->
            @endif

            @if($usuario->id_cantones!=null)

            <div class="row" id ="provincia" style="display: none"><!--Inicio de row -->
                <div class="col-md-6 col-xs-12"  >
                    <div class="form-group">
                        <label id ="label-provincia" >Provincia</label>
                        <select class="form-control select2" name="provincia" id="provincias"  >
                            @foreach($provincias as $provincia)
                                @if($provincia->id == $usuario->canton->provincia->id)
                                    <option value="{{$provincia->id}}" selected>  {{ $provincia->nombre }} </option>
                                @else
                                    <option value="{{$provincia->id}}">  {{ $provincia->nombre }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 " id ="canton" style="display:none;">
                    <div class="form-group">
                        <label id ="label-canton">Cantón</label>
                        <select class="form-control select2" name="canton" id ="canton" >

                            @foreach($usuario->canton->cantones($usuario->canton->provincia->id) as $canton)

                                @if($canton->id == $usuario->canton->id)
                                    <option value="{{$canton->id}}" selected>  {{ $canton->nombre }} </option>
                                @else
                                    <option value="{{$canton->id}}">  {{ $canton->nombre }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div><!--Fin de row -->
            @endif
            <div class="row" id="ciudad" style="display: none"><!--Inicio de row -->
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for="ciudad_input">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" id="ciudad_input" value="{{$usuario->ciudad}}"  maxlength="50" >
                    </div>
                </div>
            </div><!--Fin de row -->



                @if($usuario->titulo =="")
                <div class="row" id ="facultad"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12"   >
                        <div class="form-group">
                            <label>Facultad</label>
                            <select class="form-control select2" name="facultad" id="facultades" style="width: 100%;" >
                                @foreach($facultades as $facultad)
                                    @if($facultad->id == $usuario->carrera->facultad->id)
                                    <option value="{{$facultad->id}}" selected>  {{ $facultad->nombre }} </option>
                                    @else
                                    <option value="{{$facultad->id}}">  {{ $facultad->nombre }} </option>
                                    @endif
                                 @endforeach


                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 " id ="carrera" >
                        <div class="form-group">
                            <label>Carrera</label>
                            <select class="form-control select2" name="carrera" id ="carreras" style="width: 100%;">
                                @foreach($usuario->carrera->carreras($usuario->carrera->facultad->id) as $carrera)
                                    @if($carrera->id == $usuario->carrera->id)
                                        <option value="{{$carrera->id}}" selected>  {{ $carrera->nombre }} </option>
                                    @else
                                        <option value="{{$carrera->id}}">  {{ $carrera->nombre }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div><!--Fin de row -->
                @else


                <div class="row" id="titulo" ><!--Inicio de row -->
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            <label for="titulo_input">Titulo</label>
                            <input type="text" class="form-control" name="titulo" id="titulo_input" value="{{$usuario->titulo}}"  maxlength="50" >
                        </div>
                    </div>
                </div><!--Fin de row -->
                @endif
                <div class="row" id ="facultad" style="display: none"><!--Inicio de row -->
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
                    <div class="col-md-6 col-xs-12 " id ="carrera" style="display: none">
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
                            <input type="text" class="form-control" name="titulo" id="titulo_input" value="{{$usuario->titulo}}"  maxlength="50" >
                        </div>
                    </div>
                </div><!--Fin de row -->

                <div class="row" ><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email"  name="email" placeholder="Email" value="{{$usuario->email }}" >
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            {!!Form::label('Foto','Foto:')!!}
                            {!!Form::file('path',['class'=>'form-control'])!!}
                        </div>
                    </div>

                </div><!--Fin de row -->
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="form-group">
                        <label>Eliminar Avatar </label>
                        <label for=""> <input type="checkbox" class="flat-red" value ="eliminar" name="eliminar-avatar" @if(old('eliminar-avatar')=="eliminar") checked @endif></label>
                    </div>
                </div>
            </div>
                <div class="box-footer col-xs-12 ">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                {!! Form::close() !!}
        </div>

    </div>


@endsection
@section('script')
    <script src="{{url('administration/dist/js/usuarios/java-usuario.js')}}"></script>
    <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>
    <script src="{{url('administration/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    </script>

@endsection