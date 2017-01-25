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
        <b><font face="verdana" color="white" size="6">Recuperar Contraseña</font></b>

    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <div align="center">
            <img class="img-circle" id="img_logo" src="{{url('frontend/images/logito-escuela.jpg')}}">
        </div>
        <form  role="form" method="POST" action="{{ url('/password/reset') }}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label>Email</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope-o">
                        </i>
                    </div>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" required autofocus >
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <label>Contraseña</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope-o">
                        </i>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback">
                <label>Confirmar Contraeña</label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope-o">
                        </i>
                    </div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <center>
                        <button type="submit" class="btn btn-primary">Reset Password</button>

                    </center>
                </div><!-- /.col -->
            </div>
        </form>
    </div>

</div><!-- /.login-box -->

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
