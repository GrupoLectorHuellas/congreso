<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Usuario</title>
    <link rel="shortcut icon" href="{{url('administration/img/favicon.png')}}">

    <link rel="stylesheet" href="{{url('frontend/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('frontend/styles/font-awesome.css')}}">
    <link rel="stylesheet" href="{{url('frontend/styles/local.css')}}">

   

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url ('User/MiPerfil')}}">Eventos UTMACH</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <h4>Menú</h4>
                    <li class="active"><a href="{{url ('User/MiPerfil')}}"><i class="fa fa-user"></i> Mi Perfil</a></li>
                    <li><a href="#"><i class="fa fa-tasks"></i> Eventos</a></li>                    
                                       
                </ul>

                
                <ul class="nav navbar-nav navbar-right navbar-user">
                    
                    <li class="dropdown user-dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Fernando Castillo<b class="caret"></b></a>
                       <ul class="dropdown-menu">
                           <li><a href="{{url ('User/MiPerfil')}}"><i class="fa fa-user"></i> Mi Perfil</a></li>
                           <li><a href="{{url ('User/MiPerfil/EditarPerfil')}}"><i class="fa fa-gear"></i> Editar Perfil</a></li>
                           <li class="divider"></li>
                           <li><a href="#"><i class="fa fa-power-off"></i> Salir</a></li>
                       </ul>
                   </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                     @yield('title')
                    
                </div>
            </div>

             @yield('contenido')
            
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script src="{{url('frontend/vendor/jquery/dist/jquery.js')}}"></script>
    <script src="{{url('frontend/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('frontend/vendor/bootstrap/dist/js/bootstrap.js')}}"></script>

    @yield('script')
</body>
</html>