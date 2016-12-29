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
    


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 @section('body')
 <body class="hold-transition login-page">
@section('contenido')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Utmach </b>Eventos</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Registro en el sistema</p>
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


        <form action="register" method="post">
            {!!csrf_field()!!}
            <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
            <div class="form-group has-feedback">
                <label>Cedula</label>
                <input type="text" maxlength="10" size="10" class="form-control" name="id" value="{{old('id')}}">
            </div>

            <div class="form-group has-feedback">
                <label>Nombres</label>
                <input type="text" class="form-control" name="nombres" value="{{old('nombres')}}">
            </div>

            <div class="form-group has-feedback">
                <label>Apellidos</label>
                <input type="text" class="form-control" name="apellidos" value="{{old('apellidos')}}">
            </div>

            <div class="form-group has-feedback">
                <label>Ciudad</label>
                <input type="text" class="form-control" name="ciudad" value="{{old('ciudad')}}">
            </div>
            <div class="form-group has-feedback">
                <label>Telefono</label>
                <input type="text" class="form-control" name="telefono" value="{{old('telefono')}}">
            </div>

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
            <div class="form-group has-feedback" id ="facultad">
                <label>Facultad</label>
                <select class="form-control select2" name="facultad" id="facultades" style="width: 100%" >
                    <option value="" disabled selected>Seleccione la facultad</option>
                    @foreach($facultades as $facultad)
                        <option value="{{$facultad->id}}"> {{ $facultad->nombre }} </option>
                    @endforeach
                </select>

            </div>
            <div class="form-group has-feedback" id ="carrera">
                <label>Carrera</label>
                <select class="form-control select2" name="carrera" id="carreras" style="width: 100%">
                    <option value="" disabled selected>Seleccione la carrera</option>
                </select>
            </div>

            <div class="form-group has-feedback" id="titulo" style="display:none;">
                <label>Titulo</label>
                <input type="text" class="form-control" name="titulo" value="{{old('titulo')}}" >
            </div>


            <div class="form-group has-feedback">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}" >
            </div>

            <div class="form-group has-feedback">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="password" value="{{old('contraseña')}}" >
            </div>


            <div class="row">
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
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
@endsection()

</body>
@endsection()

