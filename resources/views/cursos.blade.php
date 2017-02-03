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
    <link rel="stylesheet" href="{{url('administration/dist/css/cursos2.css')}}">
    
    <!-- iCheck   -->
    <link rel="stylesheet" href="{{url('administration/plugins/iCheck/flat/blue.css')}}">
    @endsection()

 @section('body')
 <body class="hold-transition login-page">
 @section('contenido')

 <div class="row" style="padding-top: 75px;">
     <div class="col-md-8 col-md-offset-2">
                <div class="section-title">
                  
                  <h4 class="sub-heading" data-animation="fadeInUp" data-appear-top-offset="-190"> <span class="color">La carrera de Ingeniería de Sistemas ofrece los siguientes cursos</span></h4>
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
                            Curso de Programación</h4>
                        
                        </i></cite></small>
                        <p>
                           <i class="glyphicon glyphicon-envelope"></i>jfnando_cas_30_@hotmail.com
                            <br />
                            <i class="glyphicon glyphicon-gift"></i>Fecha Evento: 03/02/2017</p>
                            <br />
                        <!-- Split button -->
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
                        <img src="{{url('frontend/images/diseño.jpg')}}" alt="" class="img-rounded img-responsive" />
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
                            
                        <!-- Split button -->
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
                        <!-- Split button -->
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
                        <!-- Split button -->
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary" role="button">Más Información</a>
                        </div>
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