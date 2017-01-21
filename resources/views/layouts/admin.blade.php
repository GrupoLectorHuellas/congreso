<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Utmach | Congreso</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{url('administration/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('administration/fonts/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('administration/fonts/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('administration/dist/css/AdminLTE.css')}}">

    <link rel="stylesheet" href="{{url('administration/dist/css/skins/_all-skins.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('administration/plugins/iCheck/all.css')}}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{url('administration/plugins/morris/morris.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{url('administration/plugins/datepicker/datepicker3.css')}}">

    <!-- Time Picker -->
    <link rel="stylesheet" href="{{url('administration/plugins/timepicker/bootstrap-timepicker.css')}}">


    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('administration/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{url('administration/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/mensajes.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/alertify.css')}}">
    <link rel="shortcut icon" href="{{url('administration/img/favicon.png')}}">
</head>
<body class="hold-transition skin-blue sidebar-mini" style="background: #ecf0f5 !important;">
<div class="wrapper" id="contenido_principal">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('administracion')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>AD</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>ADMINISTRACIÓN</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Navegación</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <small class="bg-red">Online</small>
                            <span class="hidden-xs">{!! Auth::user()->nombres.' '.Auth::user()->apellidos !!}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">

                                <p>
                                    Administrador
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-right">
                                    <a href="{{url('logout')}}" class="btn btn-default btn-flat">Salir</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a href="{{url('administracion')}}">
                        <i class="fa fa-laptop"></i>
                        <span>Inicio</span>
                    </a>

                </li>
                <li class="treeview">
                    <a href="">
                        <i class="fa fa-user-circle-o"></i>
                        <span>Usuarios</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('usuarios.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                        <li><a href="{{route('usuarios.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span>Categorias</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('categorias.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                        <li><a href="{{route('categorias.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-plus"></i>
                        <span>Expositores</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('expositores.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                        <li><a href="{{route('expositores.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-address-card-o"></i>
                        <span>Eventos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('eventos.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                        <li><a href="{{route('eventos.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Temario</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                         <li><a href="{{route('temarios.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                        <li><a href="{{route('temarios.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Contenido</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                         <li><a href="{{route('contenidos.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                        <li><a href="{{route('contenidos.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-video-camera"></i>
                        <span>Video</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('videos.index')}}"><i class="fa fa-circle-o"></i>Actualizar</a></li>

                    </ul>
                </li>

                 <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pencil-square-o"></i>
                        <span>Firmas</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                         <li><a href="{{route('firmas.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                        <li><a href="{{route('firmas.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>

                    </ul>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background: #ecf0f5 !important;">


    @yield('title')
    <!-- Main content -->
        <section class="content" style="background: #ecf0f5 !important;">

            @yield('contenido')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <!--Fin-Contenido-->



    <!-- jQuery 2.1.4 -->
    <script src="{{url('administration/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <!-- Bootstrap 3.3.5 -->
    <script src="{{url('administration/bootstrap/js/bootstrap.min.js')}}"></script>
       <!-- daterangepicker -->
    <script src="{{url('administration/plugins/moment.min.js')}}"></script>
    <script src="{{url('administration/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{url('administration/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

    <!-- Time Picker -->
    <script src="{{url('administration/plugins/timepicker/bootstrap-timepicker.js')}}"></script>

      <!-- Slimscroll -->
    <script src="{{url('administration/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>

    <script src="{{url('administration/plugins/chartjs/Chart.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('administration/dist/js/app.min.js')}}"></script>

    <script src="{{url('administration/dist/js/sweetalert.min.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.extensions.js')}}"></script>





    @yield('script')
    </div>
</body>
</html>

