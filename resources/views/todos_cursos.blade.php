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



    <div class="container" style="padding-top: 75px;">
            <div class="col-md-8 col-md-offset-2">
                        <div class="section-title">
                        
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
            
    
    </div>


<!-- footer -->
  <footer class="light lighten">
 

    <div class="container">

      <div class="row text-center">
        <div class="col-sm-12 mb25">
          <br>

          <?php $cont = 1?>

          @foreach($redes as $red)

          @if($cont==1)

          <a class="btn btn-social-icon btn-facebook btn-rounded btn-sm ml5 mr5" href="{{$red->url}}">
            <i class="fa fa-facebook"></i>
          </a>
          @endif

           @if($cont==2)

          <a class="btn btn-social-icon btn-twitter btn-rounded btn-sm ml5 mr5" href="{{$red->url}}">
            <i class="fa fa-twitter"></i>
          </a>
          @endif


           @if($cont==3)

          <a class="btn btn-social-icon btn-instagram btn-rounded btn-sm ml5 mr5" href="{{$red->url}}">
            <i class="fa fa-instagram"></i>
          </a>

          @endif

          <?php $cont = $cont+1?>

          @endforeach

          <?php $cont = 1?>

         

        </div>

        <div class="col-sm-12 mb25">
          <p>Hecho con &nbsp;<i class="ti-heart text-danger"></i>&nbsp;en Ingenieria de Sistemas</p>
          <small class="show">&copy;&nbsp;Copyright&nbsp;Octavo A&nbsp;<span class="year"></span>. Todos los derechos reservados</small>
        </div>
      </div>
    </div>
  </footer>
  <!-- /footer -->
 
	



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