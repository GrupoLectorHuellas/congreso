<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Ingresar al Sistema</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <!-- Bootstrap 3.3.5 -->
  <link rel="shortcut icon" href="{{url('administration/img/favicon.png')}}">
  <link rel="stylesheet" href="{{url('administration/bootstrap/css/bootstrap.min.css')}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('administration/fonts/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('administration/fonts/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('administration/dist/css/AdminLTE.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{url('administration/plugins/iCheck/flat/blue.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/font-awesome.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/animate.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/sublime.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/skin.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/fonts.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box" style="margin-bottom: 25px; margin-top: 40px;">
  <div class="login-logo">
    <a href="#"><b>Utmach </b>Eventos</a>
  </div><!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingrese al sistema</p>
    @if (session('mensaje-registro'))
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {{ session('mensaje-registro') }}
      </div>
    @endif
    @if (session('mensaje'))
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        {{ session('mensaje') }}
      </div>
    @endif
    @if(!$errors->isEmpty())
      <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Error!! </strong>Complete todos los campos </p>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </div>
    @endif


    <form action="login" method="post">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

      <div class="form-group has-feedback">
        <label>Cedula</label>
        <input type="text" class="form-control" name="cedula" value="{{old('cedula')}}">
      </div>
      <div class="form-group has-feedback">
        <label>Contraseña</label>
        <input type="password" class="form-control" name="password" value="{{old('password')}}">
      </div>


      <div class="row">
        <div class="col-xs-12">
          <center>
            <button type="submit" class="btn btn-primary" style='width:100px; height:35px'>Ingresar</button>
            <a href="{{url ('/')}}" class="btn btn-primary " style='width:100px; height:35px; text-align: center'>Salir</a>
          </center>
        </div><!-- /.col -->

        
       

      </div>


      <div class="row">
        <div class="account" >

          <center>
          <br>
            <p>Tienes problemas? <a href=""> Olvidaste la contraseña ?</a></p>
          </center>
        </div>

      </div>

    </form>




  </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- footer -->
  <footer class="light lighten">

    <div class="container">
    <br>

      <div class="row text-center">

        <div class="col-sm-12 mb25">

          <a class="btn btn-social-icon btn-facebook btn-rounded btn-sm ml5 mr5" href="javascript:;">
            <i class="fa fa-facebook"></i>
          </a>

          <a class="btn btn-social-icon btn-twitter btn-rounded btn-sm ml5 mr5" href="javascript:;">
            <i class="fa fa-twitter"></i>
          </a>

          <a class="btn btn-social-icon btn-google-plus btn-rounded btn-sm ml5 mr5" href="javascript:;">
            <i class="fa fa-google-plus"></i>
          </a>

        </div>

        <div class="col-sm-12 mb25">
          <p>Hecho con &nbsp;<i class="ti-heart text-danger"></i>&nbsp;en Ingenieria de Sistemas</p>
          <small class="show">&copy;&nbsp;Copyright&nbsp;Octavo A&nbsp;<span class="year"></span>. Todos los derechos reservados</small>
        </div>
      </div>
    </div>
  </footer>
  <!-- /footer -->

<!-- jQuery 2.1.4 -->
<script src="{{url('administration/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->


<!-- Bootstrap 3.3.5 -->
<script src="{{url('administration/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- iCheck -->
<script src="{{url('administration/plugins/iCheck/icheck.min.js')}}"></script>

<script>

    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>


</body>
</html>
