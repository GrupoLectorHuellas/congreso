<!doctype html>
<html class="home no-js" lang="">

<head>
  <!-- meta -->
  <meta charset="utf-8">
  <meta name="description" content="flat, clean, responsive, application frontend template built with bootstrap 3">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{url('administration/img/favicon.png')}}">
  <!-- /meta -->

  <title>Pagina Principal</title>

  <!-- page level plugin styles -->
  <link rel="stylesheet" href="{{url('frontend/vendor/OwlCarousel/owl-carousel/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{url('frontend/vendor/OwlCarousel/owl-carousel/owl.theme.css')}}">
  <link rel="stylesheet" href="{{url('frontend/vendor/OwlCarousel/owl-carousel/owl.transitions.css')}}">
  <link rel="stylesheet" href="{{url('frontend/vendor/magnific-popup/dist/magnific-popup.css')}}">
  <!-- /page level plugin styles -->

  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="{{url('frontend/vendor/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/font-awesome.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/themify-icons.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/animate.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/sublime.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/skin.css')}}">
  <link rel="stylesheet" href="{{url('frontend/styles/fonts.css')}}">

  <script src="{{url('frontend/vendor/jquery/dist/jquery-latest.js')}}"></script>

  <script>
    //Se encarga de mostrar el botón cuando se hace scroll
    $(window).scroll(function(){
      if ($(this).scrollTop() > 500) {
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




  
  
  <!-- endbuild -->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  <!-- load modernizer -->
  <script src="{{url('frontend/vendor/modernizr.js')}}"></script>
</head>

<!-- body -->

<body>
  


  <!-- page loading spinner -->
  <div class="pageload">
    <div class="loader"></div>
  </div>
  <!-- /page loading spinner -->

  <!-- menu navigation -->
  <header class="header">
    <div class="container">
      <nav class="heading-font">

        <!-- branding -->
        <div class="branding">
          <!-- toggle menu -->
          <button type="button" class="mobile-toggle">
            <span class="ti-menu"></span>
          </button>
          <!-- /toggle menu -->

         
        
        <!-- /branding -->

        <!-- logo -->
        <a href="{{url ('/')}}" class="escuela">
          <img src="{{url('frontend/images/escuela.png')}}" alt="">
         
        </a>
        <!-- /logo -->

        <!-- links -->
        <div class="navigation spy">
          
          <ul class="nav">
           

            <li class="hide">
              <a href="#top"></a>
            </li>
            <li>
              <a href="#how">Cursos</a>
            </li>
            <li>
              <a href="#features">Servicios</a>
            </li>
            <li>
              <a href="#reviews">Ponentes</a>
            </li>
            @if(Auth::check())
            <li class="dropdown show-on-hover">
              <a href="javascript:;" class="ignore" data-toggle="dropdown"><span>Perfil</span></a>
              <ul class="dropdown-menu">
                <li>
                  <a href="{{url ('MiPerfil')}}" class="transition">Mi Perfil {!! Auth::user()->nombres.' '.Auth::user()->apellidos !!}</a>
                </li>
                <li>
                  <a href="gallery.html" class="transition">Cerrar Sesión</a>
                </li>
                
              </ul>
            </li>
              @endif

            <li>
              <a href="#" class="nav-btn btn btn-success btn-rounded" role="button" data-toggle="modal" data-target="#login-modal">Ingresar</a>
            </li>
            
            <!--
            <li>
              <a href="{{url ('login')}}">Ingresar</a>
            </li>
            -->
            <li>
              
              <a href="{{url ('register')}}" class="nav-btn btn btn-success btn-rounded">Registrarse</a> 
            </li>
          </ul>
        </div>
        <!-- /links -->
      </nav>
    </div>

  </header>
  <!-- /menu navigation -->

  <!-- hero -->


<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;">
    	<div class="modal-dialog">
			<div class="modal-content" style="padding-top: 20px;">
				<div class="modal-header" align="center">
					<img class="img-circle" id="img_logo" src="{{url('frontend/images/logito-escuela.jpg')}}">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                    <!-- Begin # Login Form -->
                    <form id ="form" method="post">

                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" id ="token">
                        <div class="alert alert-danger" id="error" style="display: none">
                            <p><strong>Error!! </strong>Usuario o contraseña incorrectos</p>
                        </div>
		                   <div class="modal-body">
				    		      <div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Escriba aquí su Usuario y Contraseña</span>
                            </div>
                              <input id="login_username" class="form-control" type="text" placeholder="Identificación" value="{{old('identificacion')}}" name ="identificacion" >
                                <div class="text-danger" id='error_identificacion'>{{$errors->first('identificacion')}}</div>

                              <input id="login_password" class="form-control" type="password" name ="password" placeholder="Contraseña">
                              <div class="text-danger" id='error_password'>{{$errors->first('password')}}</div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Recuérdame
                                </label>
                            </div>

                        </div>
				        <div class="modal-footer">
                            <div>
                                <a href="javascript:void(0);" class="btn btn-primary btn-lg btn-block" id ="login">Ingresar</a>
                            </div>
				    	    <div>
                                <a href="{{ url('/password/reset') }}" type="button" class="btn btn-link">Olvido su contraseña</a>
                                <a href="{{url ('register')}}" type="button" class="btn btn-link">Registrarme</a>
                               
                            </div>
				        </div>
                    </form>
                    <!-- End # Login Form -->


                    <!-- Begin | Olvido contraseña -->
                    <form id="lost-form" method="POST" action="{{ url('/password/email') }}" style="display:none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="<?php echo csrf_token(); ?>">

                        <div class="modal-body">
                            <div id="div-lost-msg">
                                  <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                  <span id="text-lost-msg">Ingrese los datos solicitados</span>
                            </div>
                            <input id="lost_email" class="form-control" type="text" placeholder="Ingrese el email" required>
                            
                        </div>
                      <div class="modal-footer">
                            <div>
                              <button type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                            </div>
                            <div>
                              <button id="lost_login_btn" type="button" class="btn btn-link">Login</button>
                              <a href="{{url ('register')}}" type="button" class="btn btn-link">Registrarme</a>
                            </div>
                      </div>
                    </form>
                    <!-- End | Olvido Contraseña -->
                    
                    
                    
                </div>
                <!-- End # DIV Form -->
                
			</div>
		</div>
	</div>
    <!-- END # MODAL LOGIN -->

  

  <section id="top" class="content-section hero vertical-center">

    <div class="hero-parallax parallax" style="background-image: url({{url('frontend/images/cover1.jpg')}});"></div>     

    <div class="overlay overlay-colored-9"></div>

    <div class="container">
      <div class="hero-container">
        <h1 class="hero-title" data-animation="fadeInLeft"><b>Cursos de TI</b></h1>
        <div class="hero-sub-title" data-animation="fadeInRight">
          <em>Nunca es tarde para aprender algo nuevo</em>
        </div>
        <div class="call-to-action heading-font">
          <a href="#how" class="btn btn-white btn-lg btn-outline smooth-scroll">Ver Cursos</a>
          <a href="{{$video->url}}" class="btn btn-white btn-lg popup-video">
            <i class="fa fa-play mr10"></i>
            <span>Ver video Publicitario</span>
          </a>
        </div>
      </div>
    </div>

  </section>
  <!-- /hero -->

  <!-- seccion de los cursos  -->
  <section id="how">
    <br>
    <br>
    <br>
    <div class="container">
              <div class="col-md-8 col-md-offset-2">
                <div class="section-title">
                  <h5 class="heading" data-animation="fadeInDown" data-appear-top-offset="-200"><em>¿Y los cursos?</em></h5>
                  <h4 class="sub-heading" data-animation="fadeInUp" data-appear-top-offset="-190"> <span class="color">La carrera de Ingeniería de Sistemas ofrece los siguientes cursos</span></h4>
                </div>
              </div>
  
       
          @foreach($eventos as $evento)
           

           <div class="[ col-sm-6  col-md-4 ]">
                    <div class="[ info-card ]">
                      <img style="height: 425px; width:100%; " src=" {{url('uploads')}}/{{$evento->path}}" />
                          <div class="[ info-card-details ] animate">
                                <div class="[ info-card-header ]">
                                  <h1> {{$evento->categoria->nombre}}</h1>
                                  <h3> Curso de {{$evento->nombre}} </h3>
                                </div>
                                  <div class="[ info-card-detail ]">
                                    <!-- Description -->
                                    
                                          
                                          <p style="font-weight: bold; font-size: 125%;"> Al terminar este curso vas a aprender</p>

                                          <p align=justify>

                                            {{$evento->descripcion}}
                                            
                                          </p>
                                            <p align=justify>

                                            <b>Inicia: </b> {{$evento->fecha_inicio}}
                                            <br>
                                            <b>Finaliza: </b> {{$evento->fecha_fin}}
                                            
                                          </p>



                                          {!!link_to('cursos/'.$evento->id.'', $title = 'Más Información', $attributes = ['class'=>'btn  btn-primary btn-md'], $secure = null)!!}
                                  </div>
                            </div>
                        </div>
                    </div>

                    
                    
           
          @endforeach

         
   
      <div class="row">
            <div class="col-xs-12">
              <center>
               <a href="{{url ('cursos')}}" class="btn btn-primary" role="button">Ver Todos Los Cursos</a>
                
              </center>
            </div>
	        </div>
              
<!--
        <div class="container">
            <div class="row">
                 

                  <div class="[ col-sm-6  col-md-4 ]">
                    <div class="[ info-card ]">
                      <img style="height: 425px; width:100%;" src="{{url('frontend/images/programacion.png')}}" />
                      <div class="[ info-card-details ] animate">
                        <div class="[ info-card-header ]">
                          <h1> Programación Web</h1>
                          <h3> Diseño y Programación Web </h3>
                        </div>
                        <div class="[ info-card-detail ]">
                   
                                <div class="feature-icon bordered">
                                     <i class="ti-cloud color"></i>
                                </div>
                                <p style="font-weight: bold; font-size: 125%;"> Al terminar este curso vas a aprender</p>

                                <p align=justify>Aprenderá conceptos básicos de redes wan y lan, de igual forma
                                  comprenderá los comandos necesarios para la administración y mantenimiento de las mismas
                                   dfdfdfdffdfdffdfdfdffdffdffddfdfdfdfdfdfdfdfdfdfddddddd
                                   dddddddddddddddddddddddddddddd
                                   
                                  
                                 </p>

                                 <a href="#" class="btn btn-primary" role="button">Más Información</a>
                          
                          

                          
                      </div>
                    </div>
                  </div>
                  </div>

                    <div class="[ col-sm-6  col-md-4 ]">
                      <div class="[ info-card ]">
                        <img style="height: 425px; width:100%;" src="{{url('frontend/images/matematicas.jpg')}}" />
                        <div class="[ info-card-details ] animate">
                          <div class="[ info-card-header ]">
                              <h1> Matemáticas </h1>
                            <h3> Curso de Derivadas e Integrales </h3>
                          </div>
                          <div class="[ info-card-detail ]">
                   
                            <div class="feature-icon bordered">
                                     <i class="ti-cloud color"></i>
                                </div>
                                <p style="font-weight: bold; font-size: 125%;"> Al terminar este curso vas a aprender</p>

                                <p align=justify>Aprenderá conceptos básicos de redes wan y lan, de igual forma
                                  comprenderá los comandos necesarios para la administración y mantenimiento de las mismas
                                   dfdfdfdffdfdffdfdfdffdffdffddfdfdfdfdfdfdfdfdfdfddddddd
                                   dddddddddddddddddddddddddddddd
                                   
                                  
                                 </p>

                                 <a href="#" class="btn btn-primary" role="button">Más Información</a>
                          
                            

                            
                        </div>
                      </div>
                    </div>
                    </div>

             </div>

                    


   -->

            

     

      

    </div>

    
    <br>
    <br>
    <br>
  </section>


  

  <!-- seccion de servicios -->
  <section id="features" class="features feature light">
  <br>
    <br>
    <br>
    <div class="container">

      <div class="col-md-8 col-md-offset-2">
        <div class="section-title">
          <h5 class="heading" data-animation="fadeInDown" data-appear-top-offset="-200"><em>La carrera de Ingenería de Sistemas</em></h5>
          <h4 class="sub-heading" data-animation="fadeInUp" data-appear-top-offset="-190">ofrece los siguientes <b class="color">Servicios</b></h4>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="row">

            <div class="col-md-12 mb15" data-animation="fadeInRight" data-appear-top-offset="-200">
              <div class="feature-icon left">
                <i class="ti-timer color"></i>
              </div>
              <div class="feature-description">
                <h5>Clases Presenciales</h5>
                <p>Todas las clases de los cursos ofrecidos por la carrera serán realizadas dentro de la institución</p>
              </div>
            </div>

            <div class="col-md-12 mb15" data-animation="fadeInDown" data-delay="200" data-appear-top-offset="-200">
              <div class="feature-icon left">
                <i class="ti-bag color"></i>
              </div>
              <div class="feature-description">
                <h5>Expositores Profesionales</h5>
                <p>Los cursos son impartidos por profesionales altamente capacitados, garantizando conocimientos de calidad</p>
              </div>
            </div>

            <div class="col-md-12 mb15" data-animation="fadeInLeft" data-delay="200" data-appear-top-offset="-200">
              <div class="feature-icon left">
                <i class="ti-bookmark-alt color"></i>
              </div>
              <div class="feature-description">
                <h5>Diplomas de Certificación</h5>
                <p>Una vez finalizado y aprobado el curso te enviarémos un certificado por correo electrónico</p>
              </div>
            </div>

          </div>
        </div>
        <div class="col-sm-6 text-center ">
          <div class="mt25">
            <div>
              <img src="{{url('frontend/images/feature-shot.jpg')}}" class="mt25" data-animation="fadeInUp" alt="">
            </div>
          </div>
           <br>
  </br>
        </div>
       
  </section>

  
 


  
  



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
   <script src="{{url('frontend/vendor/jquery/dist/jquery.min.js')}}"></script>
  
  <script src="{{url('frontend/vendor/bootstrap/dist/js/bootstrap.js')}}"></script>
  <script src="{{url('frontend/vendor/jquery.easing/jquery.easing.js')}}"></script>
  <script src="{{url('frontend/vendor/jquery_appear/jquery.appear.js')}}"></script>
  <script src="{{url('frontend/vendor/jquery.placeholder.js')}}"></script>
  <script src="{{url('frontend/vendor/fastclick/lib/fastclick.js')}}"></script>
  <script src="{{url('frontend/vendor/jQuery-One-Page-Nav/jquery.nav.js')}}"></script>
  <!-- endbuild -->

  <!-- page level scripts -->
  <script src="{{url('frontend/vendor/jquery-parallax/scripts/jquery.parallax-1.1.3.js')}}"></script>
  <script src="{{url('frontend/vendor/isotope/dist/isotope.pkgd.min.js')}}"></script>
  <script src="{{url('frontend/vendor/jquery-countTo/jquery.countTo.js')}}"></script>
  <script src="{{url('frontend/vendor/OwlCarousel/owl-carousel/owl.carousel.min.js')}}"></script>
  <script src="{{url('frontend/vendor/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
  <!-- /page level scripts -->

  <!-- template scripts -->
  <script src="{{url('frontend/scripts/main.js')}}"></script>
  <!-- /template scripts -->

  <!-- page script -->
  
  <script src="{{url('frontend/scripts/demo_home.js')}}"></script>
  <script src="{{url('frontend/scripts/java-login.js')}}"></script>
  <!-- /page script -->

<a onClick="arriba();" class="arrowtop ti-arrow-up"></a>


</body>

</html>
