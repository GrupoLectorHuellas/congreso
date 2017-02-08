@extends("layouts.basetodoscursos")
    @section('title')
    <title>Todos los cursos</title>
    @endsection()
    @section('head')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('administration/fonts/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('administration/fonts/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('administration/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/cursos2.css')}}">
    
    <!-- iCheck   -->
    <link rel="stylesheet" href="{{url('administration/plugins/iCheck/flat/blue.css')}}">
    @endsection()

 @section('body')
 <body class="hold-transition login-page">
 @section('contenido')

<!--
 <div class="row" style="padding-top: 75px;">
     <div class="col-md-8 col-md-offset-2">
                <div class="section-title">
                  
                  <h4 class="sub-heading" data-animation="fadeInUp" data-appear-top-offset="-190"> <span class="color">La carrera de Ingeniería de Sistemas ofrece los siguientes cursos</span></h4>
                </div>
     </div>

        <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="well well-sm profile-card">
                <div class="row">
                    

                    <div class="col-sm-6 col-md-4">
                        <img src="{{url('frontend/images/programacion.png')}}" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8 ">
                        <h4 class="hvr-underline-from-center">Curso de Programación</h4>
                            
                        
                        </i></cite></small>
                        <p>
                           <i class="glyphicon glyphicon-envelope"></i>jfnando_cas_30_@hotmail.com
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>Fecha Evento: 03/02/2017</p>
                            <br />
                        
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary" role="button">Más Información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="{{url('frontend/images/programacion.png')}}" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            Curso de Diseño Gráfico</h4>
                        
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>jfnando_cas_30_@hotmail.com
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>Fecha Evento: 03/02/2017</p>
                            <br />
                            
                      
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary" role="button">Más Información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="{{url('frontend/images/redes-cisco.png')}}" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                           Curso de Redes</h4>
                        
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>jfnando_cas_30_@hotmail.com
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>Fecha Evento: 03/02/2017</p>
                            <br />
                        
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary" role="button">Más Información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="{{url('frontend/images/matematicas.jpg')}}" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            Curso de Matemáticas</h4>
                        
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>jfnando_cas_30_@hotmail.com
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>Fecha Evento: 03/02/2017</p>
                            <br />
                      
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary" role="button">Más Información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    -->

    <div class="container" style="padding-top: 75px;">
            <div class="col-md-8 col-md-offset-2">
                        <div class="section-title">
                        
                        <h4 class="sub-heading" data-animation="fadeInUp" data-appear-top-offset="-190"> <span class="color">La carrera de Ingeniería de Sistemas ofrece los siguientes cursos</span></h4>
                        </div>
            </div>
            <div class="row">
                  <div class="[ col-sm-6  col-md-4 ]">
                    <div class="[ info-card ]">
                      <img style="height: 425px; width:100%; " src="{{url('frontend/images/redes-cisco.png')}}" />
                      <div class="[ info-card-details ] animate">
                        <div class="[ info-card-header ]">
                          <h1> Redes CISCO </h1>
                          <h3> Curso de Redes WAN y LAN </h3>
                        </div>
                        <div class="[ info-card-detail ]">
                          <!-- Description -->
                           
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

                          <!--
                          <div class="social">
                            <a href="https://www.facebook.com/rem.mcintosh" class="[ social-icon facebook ] animate"><span class="fa fa-facebook"></span></a>

                            <a href="https://twitter.com/Mouse0270" class="[ social-icon twitter ] animate"><span class="fa fa-twitter"></span></a>

                            <a href="https://github.com/mouse0270" class="[ social-icon github ] animate"><span class="fa fa-github-alt"></span></a>

                            <a href="https://plus.google.com/u/0/115077481218689845626/posts" class="[ social-icon google-plus ] animate"><span class="fa fa-google-plus"></span></a>

                            <a href="www.linkedin.com/in/remcintosh/" class="[ social-icon linkedin ] animate"><span class="fa fa-linkedin"></span></a>
                        
                          </div>
                            -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="[ col-sm-6  col-md-4 ]">
                    <div class="[ info-card ]">
                      <img style="height: 425px; width:100%;" src="{{url('frontend/images/programacion.png')}}" />
                      <div class="[ info-card-details ] animate">
                        <div class="[ info-card-header ]">
                          <h1> Programación Web</h1>
                          <h3> Diseño y Programación Web </h3>
                        </div>
                        <div class="[ info-card-detail ]">
                          <!-- Description -->
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
                            <!-- Description -->
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



 
	



@endsection()


@section('script')

<!-- Bootstrap 3.3.5 -->
<script src="{{url('administration/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('administration/dist/js/java-registro.js')}}"></script>
<script src="{{url('administration/dist/js/sweetalert.min.js')}}"></script>
<script src="{{url('administration/dist/js/alertify.js')}}"></script>
<script src="{{url('administration/dist/js/jquery.center.min.js')}}"></script>
@endsection()

</body>
@endsection()