@extends("layouts.base")
    @section('title')
    <title>Sistema Laravel | Registro</title>
    @endsection()
    @section('head')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('administration/fonts/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('administration/fonts/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('administration/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck   -->
    <link rel="stylesheet" href="{{url('administration/plugins/iCheck/flat/blue.css')}}">
    @endsection()

 @section('body')
 <body class="hold-transition login-page">
 @section('contenido')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Utmach </b>Eventos</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <div class="alert alert-info alert-dismissable">
            <a class="panel-close close" data-dismiss="alert">×</a> 
            <i class="fa fa-coffee"></i>
            Por Favor Completar todos los campos con información Verídica
        </div>
        <div class="alert alert-danger" id="ponerfocus" style="display: none">
                <p><strong>Error!! </strong>Corrija los siguientes errores</p>
            </div>

        <form method="post" id='form'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">

             <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group has-feedback ">
                            <label>Nacionalidad</label>
                             <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                    <select class="form-control select2" name="nacionalidades" id="nacionalidades" style="width: 100%" >
                                            <option value="Ecuatoriano" selected>Ecuatoriano</option>
                                            <option value="Extranjero Residente">Extranjero Residente</option>
                                            <option value="Extranjero No Residente">Extranjero No Residente</option>

                                    </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                           <div class="form-group has-feedback">
                                <label id ="label-dni">Identificación (Cédula)</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-address-card">
                                        </i>
                                    </div>
                                     <input type="text" maxlength="10" size="10" class="form-control" name="identificacion"  value="{{old('identificacion')}}" >
                                    <div class="text-danger" >{{$errors->first('identificacion')}}</div>
                                    <div class="text-danger" id='error_identificacion'>{{$errors->first('identificacion')}}</div>
                                </div>
                            </div>
                     </div>
             </div><!--Fin de row -->


             <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group has-feedback">
                            <label>Nombres</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                <input type="text" class="form-control" name="nombres" value="{{old('nombres')}}">
                                 <div class="text-danger" id='error_nombres'>{{$errors->first('nombres')}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group has-feedback">
                            <label>Apellidos</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user">
                                        </i>
                                    </div>
                                 <input type="text" class="form-control" name="apellidos" value="{{old('apellidos')}}">
                                <div class="text-danger" id='error_apellidos'>{{$errors->first('cedula')}}</div>
                            </div>
                        </div>
                    </div>
            </div> <!--Fin de row -->


            <div class="form-group has-feedback">
                <label>Género</label>
                <div >
                    <div class="col-xs-6">
                        <label class="radio-inline"><input checked = "checked" type="radio" name="radio-genero" value="Masculino">Masculino</label>
                    </div>
                    <div class="col-xs-6">
                        <label class="radio-inline"><input type="radio" name="radio-genero" value="Femenino">Femenino</label>
                    </div>

                </div>

            </div>

            <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group has-feedback">
                            <label>Teléfono</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone">
                                        </i>
                                    </div>
                                 <input type="text" class="form-control" name="telefono" value="{{old('telefono')}}">
                                <div class="text-danger" >{{$errors->first('telefono')}}</div>
                                <div class="text-danger" id='error_telefono'>{{$errors->first('telefono')}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group has-feedback">
                            <label id ="label-pais">País</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker">
                                        </i>
                                    </div>
                                 <input type="text" class="form-control" name="pais" value="Ecuador" id ="pais" disabled>
                                <div class="text-danger" >{{$errors->first('pais')}}</div>
                                <div class="text-danger" id='error_pais'>{{$errors->first('pais')}}</div>
                            </div>
                        </div>
                    </div>
             </div> <!--Fin de row -->

            <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                            <div class="form-group has-feedback" id="provincia">
                                <label id ="label-provincia">Provincia</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker">
                                        </i>
                                    </div>
                                    <select class="form-control select2" name="provincia" id="provincias" style="width: 100%" >

                                    <option value="" disabled selected>Seleccione la provincia</option>
                                    @foreach($provincias as $provincia)
                                        <option value="{{$provincia->id}}"> {{ $provincia->nombre }} </option>
                                    @endforeach
                                    </select>
                                    <div class="text-danger" id='error_provincia'>{{$errors->first('provincia')}}</div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                            <div class="form-group has-feedback" id="canton">
                                <label id ="label-canton">Cantón</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-map-marker">
                                        </i>
                                    </div>
                                    <select class="form-control select2" name="canton" id="cantones" style="width: 100%">
                                         <option value="" disabled selected>Seleccione el cantón</option>
                                        <div class="text-danger" >{{$errors->first('canton')}}</div>
                                    </select>
                                    <div class="text-danger" id='error_canton'>{{$errors->first('canton')}}</div>
                                </div>
                            </div>
                    </div>
             </div> <!--Fin de row -->
            
            <div class="form-group has-feedback" style="display: none" id ="ciudad">
                    <label>Ciudad</label>
                            <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home">
                                        </i>
                                    </div>
                                 <input type="text" class="form-control" name="ciudad" value="{{old('ciudad')}}">
                                  <div class="text-danger" id='error_ciudad'>{{$errors->first('ciudad')}}</div>
                            </div>
           
            </div>

             <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group has-feedback">
                            <label id ="label-pais">Dirección</label>
                             <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home">
                                        </i>
                                    </div>
                                    <input type="text" class="form-control" name="direccion" id ="direccion">
                                    <div class="text-danger" id='error_direccion'>{{$errors->first('direccion')}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group has-feedback">
                            <label>Email</label>
                             <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope-o">
                                        </i>
                                    </div>
                                <input type="email" class="form-control" name="email" value="{{old('email')}}" >
                                <div class="text-danger" id='error_email'>{{$errors->first('email')}}</div>
                            </div>
                        </div>
                        
                    </div>
            </div> <!--Fin de row -->

            <div class="form-group has-feedback">
                <label>Ocupación</label>
                <div >
                    <div class="col-xs-6">
                        <label class="radio-inline"><input checked = "checked" type="radio" name="optradio" value="Estudiante">Estudiante</label>
                    </div>
                    <div class="col-xs-6">
                        <label class="radio-inline"><input type="radio" name="optradio" value="Profesional">Profesional</label>
                    </div>

                </div>

            </div>

            <div class="row"><!--Inicio de row -->
                    <div class="col-md-6 col-xs-12">

                        <div class="form-group has-feedback" id ="facultad">
                            <label>Facultad</label>
                             <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-university">
                                        </i>
                                    </div>
                                <select class="form-control select2" name="facultad" id="facultades" style="width: 100%" >
                                     <option value="" disabled selected>Seleccione la facultad</option>
                                    @foreach($facultades as $facultad)
                                        <option value="{{$facultad->id}}"> {{ $facultad->nombre }} </option>
                                    @endforeach
                                </select>
                                 <div class="text-danger" id='error_facultad'>{{$errors->first('facultad')}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12">
                        <div class="form-group has-feedback" id ="carrera">
                            <label>Carrera</label>
                             <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-university">
                                        </i>
                                    </div>
                                <select class="form-control select2" name="carrera" id="carreras" style="width: 100%">
                                     <option value="" disabled selected>Seleccione la carrera</option>
                                 </select>
                                <div class="text-danger" id='error_carrera'>{{$errors->first('carrera')}}</div>
                            </div>
                        </div>
                    </div>
            </div> <!--Fin de row -->

            <div class="form-group has-feedback" id="titulo" style="display:none;">
                <label>Título</label>
                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-university">
                                        </i>
                                    </div>
                    <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}" >
                    <div class="text-danger" id='error_titulo'>{{$errors->first('titulo')}}</div>
                </div>
            </div>



            <div class="form-group has-feedback">
                <label>Contraseña</label>
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-lock"></span>
                    <input type="password" class="form-control" name="password" value="{{old('password')}}">
                    <div class="text-danger" id='error_password'>{{$errors->first('password')}}</div>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-4">
                     
                </div><!-- /.col -->
                <div class="col-xs-4">
                     <center>
                    <a href="javascript:void(0);" class="btn btn-primary" id ="registro">Registrar</a>
                     </center>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    
                </div><!-- /.col -->
            </div>
        </form>
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
@endsection()


@section('script')

<!-- Bootstrap 3.3.5 -->
<script src="{{url('administration/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('administration/dist/js/java-registro.js')}}"></script>
<script src="{{url('administration/dist/js/sweetalert.min.js')}}"></script>
<script src="{{url('administration/dist/js/alertify.min.js')}}"></script>
<script src="{{url('administration/dist/js/jquery.center.min.js')}}"></script>
@endsection()

</body>
@endsection()

