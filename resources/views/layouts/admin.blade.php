<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Utmach | Congreso</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{url('administration/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/skins/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/morris/morris.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/datepicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/timepicker/bootstrap-timepicker.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <link rel="stylesheet" href="{{url('administration/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <link rel="stylesheet" href="{{url('administration/plugins/datatables/dataTables.bootstrap.css')}}">

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
            <span class="logo-mini"><b>AD</b></span>
            <span class="logo-lg"><b>ADMINISTRACIÓN</b></span>
        </a>
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
                        <i class="fa fa-address-card-o"></i><span>Eventos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('eventos.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                        <li><a href="{{route('eventos.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>
                        <li>
                            <a href="#"><i class="fa fa-book"></i> Temario
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{route('temarios.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                                <li><a href="{{route('temarios.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-book"></i> Contenido
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{route('contenidos.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                                <li><a href="{{route('contenidos.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                 <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-image-o"></i>
                        <span>Certificado Imágen</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('imagenes.index')}}"><i class="fa fa-circle-o"></i>Actualizar</a></li>

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


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-university"></i>
                        <span>Inscripciones</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('inscripciones.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                        <li><a href="{{route('inscripciones.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>
                        <li><a href="{{url('administracion/validar-inscripcion')}}"><i class="fa fa-circle-o"></i> Validar</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-clock-o"></i>
                        <span>Asistencia</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('asistencias.index')}}"><i class="fa fa-circle-o"></i>Listado</a></li>
                        <li><a href="{{route('asistencias.create')}}"><i class="fa fa-circle-o"></i> Agregar</a></li>
            
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span>Reportes</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('administracion/reportes/aprobados')}}"><i class="fa fa-circle-o"></i>Aprobados</a></li>
                        <li><a href="{{url('administracion/reportes/reprobados')}}"><i class="fa fa-circle-o"></i> Reprobados</a></li>
                        <li><a href="{{url('administracion/reportes/inscritos')}}"><i class="fa fa-circle-o"></i> Inscritos</a></li>

                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-th"></i>
                        <span>Certificados</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('administracion/certificados/generar')}}"><i class="fa fa-circle-o"></i>Generar</a></li>
                        <li><a href="{{url('administracion/certificados/listado')}}"><i class="fa fa-circle-o"></i>Listado</a></li>

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
    <script src="{{url('administration/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{url('administration/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('administration/plugins/moment.min.js')}}"></script>
    <script src="{{url('administration/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{url('administration/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{url('administration/plugins/timepicker/bootstrap-timepicker.js')}}"></script>
    <script src="{{url('administration/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('administration/plugins/chartjs/Chart.min.js')}}"></script>
    <script src="{{url('administration/dist/js/app.min.js')}}"></script>
    <script src="{{url('administration/dist/js/sweetalert.min.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.extensions.js')}}"></script>

    <script src="{{url('administration/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('administration/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>




    @yield('script')
    </div>
</body>
</html>

