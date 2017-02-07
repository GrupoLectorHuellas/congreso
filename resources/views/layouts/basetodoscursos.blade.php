<!doctype html>
<html class="home no-js" lang="">

<head>
  <!-- meta -->
 <meta charset="utf-8">
  <meta name="description" content="flat, clean, responsive, application frontend template built with bootstrap 3">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{url('administration/img/favicon.png')}}">
  <!-- /meta -->
  @yield('title')
  <title>Inicio</title>

  <!-- page level plugin styles -->

  <!-- /page level plugin styles -->

  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="{{url('frontend/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/font-awesome.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/animate.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/sublime.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/skin.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/fonts.css')}}">
  




  <link rel="shortcut icon" href="{{url('administration/img/favicon.png')}}">
  <!-- load modernizer -->
  <script src="{{url('frontend/vendor/modernizr.js')}}"></script>
  
  


   @yield('head')
</head>

<!-- body -->
@yield('body')
<body>
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="loader"></div>
  </div>
  <!-- /page loading spinner -->

  <!-- menu navigation -->
  <header class="header fixed-sticky">
    <div class="container">
      <nav class="heading-font">

        <!-- branding -->
        <div class="branding">
          <!-- toggle menu -->
          <button type="button" class="mobile-toggle">
            <span class="ti-menu"></span>
          </button>
          <!-- /toggle menu -->

          <!-- logo -->
        <a href="{{url ('/')}}" class="escuela">
          <img src="{{url('frontend/images/escuela.png')}}" alt="">
         
        </a>
        <!-- /logo -->
        </div>
        <!-- /branding -->

        <!-- links -->
        <div class="navigation spy">
          <ul class="nav">

            <li class="hide">
              <a href="#top"></a>
            </li>
            <li>
              <a href="{{url ('/')}}">Inicio</a>
            </li>
            <li>
              <a href="#eventos">Eventos</a>
            </li>

            @if (Auth::check())

            <li class="dropdown show-on-hover">
              <a href="javascript:;" class="ignore" data-toggle="dropdown"><span>Perfil</span></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="{{url ('MiPerfil')}}" class="transition">Mi Perfil</a>
                </li>
                <li>
                  <a href="#" class="transition">Cerrar Sesión</a>
                </li>
                
              </ul>
            </li>
              @endif
            
            
            
          </ul>
        </div>
        <!-- /links -->
      </nav>
    </div>

  </header>
  <!-- /menu navigation -->

 
<div class="container">
   <section>
        @yield('contenido')

    

  </section>

</div>
 

 <!-- footer -->
  <footer class="light lighten">

    <div class="container">

      <div class="row text-center">

        <div class="col-sm-12 mb25">

          

          <br>

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
  
  <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="{{url('frontend/vendor/jquery/dist/jquery.js')}}"></script>


  <script src="{{url('frontend/vendor/bootstrap/dist/js/bootstrap.js')}}"></script>
  <script src="{{url('frontend/scripts/main.js')}}"></script>
  <a onClick="arriba();" class="arrowtop ti-arrow-up"></a>
  <script>
      //Se encarga de mostrar el botón cuando se hace scroll
      $(window).scroll(function(){
          if ($(this).scrollTop() > 150) {
              $('.arrowtop').fadeIn();
          } else {
              $('.arrowtop').fadeOut();
          }
      });
      //Se encarga de subir al top al hacer clic en el botón
      function arriba(){
          $("html, body").animate({ scrollTop: 0 }, 600);
          return false;
      }
  </script>
  

   @yield('script')

   


</body>

</html>