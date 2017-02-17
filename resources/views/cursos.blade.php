@extends("layouts.base")
    @section('title')
    <title>Curso de {{$eventos->nombre}} </title>
    @endsection()
    @section('head')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('administration/fonts/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('administration/fonts/ionicons.min.css')}}">
    <!-- Theme style -->

    <link rel="stylesheet" href="{{url('administration/dist/css/main.css')}}">

    
  
    
    @endsection()

 @section('body')
 <body class="hold-transition login-page">
 
 @section('contenido')



<section class="vertical-center">
<div class="pagewrapper">
<section class="cover__home front">
<div class="background__home">
</div>
<div class="container">
<div class="pagetitle">
<article class="home__page">
<h1 class="home__page__title">Curso de {{$eventos->nombre}}</h1>
<p class="home__page__slogan">{{$eventos->descripcion}}</p>
<a data-toggle="modal" data-target="#registroModal" href="#" role="button" class="home__page__button">Inscribete ahora</a>
</article>
</div>
</div>
</section>
</div>

  </section>

<div style="padding-top: 75px;">
<h4 class="course__agenda__title" data-animation="fadeInUp" data-appear-top-offset="-190"> <span class="color">Temario</span></h4>
</div>

<!-- SPEAKERS -->

  <section class="speakers" id="speakers">
      <div class="row" id="speakers">
        <div class="col-md-10 col-md-offset-1">
            <div class="title-div speaker">
                    <div class="python-icon col-md-1"/></div>
                      <h2 class="col-md-5">Agenda</h2>
                    </div>
                <div class="div-shadow">
                  <table align="center" border="1" bordercolor="blue" class="table table-bordered">
                    <tr>
                      <th class="col-md-12 text-center" colspan="6">Del {{$eventos->fecha_inicio}} al {{$eventos->fecha_fin}} </th>
                    </tr>
                   
                    
                  

                           
        
                        @foreach ($temarios as $temario)

                            <tr>
                                <td colspan="3"><P ALIGN=center><b>Tema:</b> {{$temario->nombre}}</p></td>
                                
                               
                               
                             </tr>

                             <tr>
                                <td colspan="3"><P ALIGN=center><b>Duración en Horas: </b> {{$temario->duracion}} H</p></td>
                                
                               
                               
                             </tr>
                   
                       
                                   
                                 

                                <tr>
                     
                                    <th class="col-md-4">Contenido</th>
                                    <th class="col-md-4">Fecha Inicio</th>
                                    <th class="col-md-4">Fecha Fin</th>
                                 </tr>

                                
                                @foreach($contenidos as $contenido)
                               
                                    @if($temario->id == $contenido->id_temarios )
                                     
                                        
                                          <tr>
                                          
                                           
                                                <td class="col-md-4">{{$contenido->subtemas}}</td>
                                                <td class="col-md-4">{{$contenido->fecha_inicio}}</td>
                                                <td class="col-md-4">{{$contenido->fecha_fin}}</td>

                                          </tr>
                                        
                                   
                                        
                                    
                                    @endif
                                     
                                           
                                @endforeach    

                                    
                                                                  
                                
                               
                        
                        @endforeach

                    
                     
                    

                    </table>
                    
                    
                </div>
          </div>
      </div>
       </div>

  </section>

  <!-- / SPEAKERS -->

 

 
                  
<h4 class="course__agenda__title" data-animation="fadeInUp" data-appear-top-offset="-190"> <span class="color">Ponentes</span></h4>
        

<div class="container">

            <?php $array = array(); ?>
             <?php $cont = 0?>
                                
                                 
                                       
            @foreach($eventos->expositores as $expositor_propio)
                    <?php $array[] = $expositor_propio->id;?>
            @endforeach

         @foreach($expositores as $expositor)
                 @if(in_array($expositor->id,$array) )
                        @if(count($expositores) >0)
                            <?php $cont = $cont+1?>
                        @endif
                 @endif
   
        @endforeach

         @foreach($expositores as $expositor)
                 @if(in_array($expositor->id,$array) )

                       
                        @if($cont==1)

                                     

                                    <div class="[ col-sm-12  col-md-12 ]">
                                        <center>
                                            <a href="#" data-toggle="modal" data-target="#{{$expositor->id}}"><img src="{{url('uploads')}}/{{$expositor->path}}" name="aboutme" width="140" height="140" class="img-circle"></a>
                                            <h3> {{$expositor->nombres.'  '. $expositor->apellidos}}</h3>
                                            <em>click en mi cara para más información</em>
                                        </center>
                                    </div>

                                    

                                    

                        @elseif($cont==2)

                                     <div class="[ col-sm-6  col-md-6 ]">
                                        <center>
                                            <a href="#" data-toggle="modal" data-target="#{{$expositor->id}}"><img src="{{url('uploads')}}/{{$expositor->path}}" name="aboutme" width="140" height="140" class="img-circle"></a>
                                            <h3> {{$expositor->nombres.'  '. $expositor->apellidos}}</h3>
                                            <em>click en mi cara para más información</em>
                                        </center>
                                    </div>

                                   
                                    

                        @elseif($cont==3)

                                    

                                     <div class="[ col-sm-4  col-md-4 ]">
                                        <center>
                                            <a href="#" data-toggle="modal" data-target="#{{$expositor->id}}"><img src="{{url('uploads')}}/{{$expositor->path}}" name="aboutme" width="140" height="140" class="img-circle"></a>
                                            <h3> {{$expositor->nombres.'  '. $expositor->apellidos}}</h3>
                                            <em>click en mi cara para más información</em>
                                        </center>
                                    </div>
                            
                        @elseif($cont>3)


                                    <div class="[ col-sm-4  col-md-4 ]">
                                        <center>
                                            <a href="#" data-toggle="modal" data-target="#{{$expositor->id}}"><img src="{{url('uploads')}}/{{$expositor->path}}" name="aboutme" width="140" height="140" class="img-circle"></a>
                                            <h3> {{$expositor->nombres.'  '. $expositor->apellidos}}</h3>
                                            <em>click en mi cara para más información</em>
                                        </center>
                                    </div>

                                    

                        @endif
                        
                        




                       
                        @else






                    @endif

                     <!-- Modal -->
                    <div class="modal fade" id="{{$expositor->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title" id="myModalLabel">Biografía</h4>
                                            </div>
                                        <div class="modal-body">
                                            <center>
                                            <img src="{{url('uploads')}}/{{$expositor->path}}" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                                            <h3 class="media-heading">{{$expositor->nombres.'  '. $expositor->apellidos}} 
                                            
                                            </center>
                                            <hr>
                                            <center>
                                            <strong>Datos del Ponente </strong>
                                            <p class="text-left">
                                            <b>Nombre y Apellidos: </b> {{$expositor->nombres.'  '. $expositor->apellidos}} <br>
                                            <b>Titulo: </b> {{$expositor->titulo}} <br>
                                            <b>Email: </b> {{$expositor->email}} <br>
                                            <b>Experiencias laborales: </b> {{$expositor->experiencia_laboral}} <br>
                                               
                                                </p>
                                            <br>
                                            </center>
                                        </div>
                                        <div class="modal-footer">
                                            <center>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                                            </center>
                                        </div>
                            </div>
                        </div>
                    </div>
            @endforeach

       


                  


                       
 
               

               

          
    

  
</div>

<br>
<h4 class="course__agenda__title" data-animation="fadeInUp" data-appear-top-offset="-190"> <span class="color">Precios</span></h4>


<!-- Contenedor -->

<div class="container">

        <div class="[ col-sm-6  col-md-6 ]">
          

            <div class="pricing-table">
                    <h3 class="pricing-title">Estudiantes</h3>
                    <div class="price">$  {{$eventos->precio_estudiante}}<sup></div>
                    <!-- Lista de Caracteristicas / Propiedades -->
                    <ul class="table-list">
                        <li>Clases Presenciales</li>
                         <li>Expositores Profesionales y Capacitados</li>
                         <li>Diplomas de Certificación</li>
                         <li>Equipos de primera</li>
                        
                    </ul>
                    <!-- Contratar / Comprar -->
                    <div class="table-buy">
                        <p>$  {{$eventos->precio_estudiante}}<sup></p>
                        <a href="#" class="pricing-action">Contratar</a>
                    </div>
            </div>
        

          


                                            
           
        </div>

        <div class="[ col-sm-6  col-md-6 ]">
            

         <div class="pricing-table">
                    <h3 class="pricing-title">Profesional</h3>
                    <div class="price">$ {{$eventos->precio_profesional}}<sup></div>
                    <!-- Lista de Caracteristicas / Propiedades -->
                    <ul class="table-list">
                        <li>Clases Presenciales</li>
                         <li>Expositores Profesionales y Capacitados</li>
                         <li>Diplomas de Certificación</li>
                         <li>Equipos de primera</li>
                        
                    </ul>
                    <!-- Contratar / Comprar -->
                    <div class="table-buy">
                        <p>$  {{$eventos->precio_profesional}}<sup></p>
                        <a href="#" class="pricing-action">Contratar</a>
                    </div>
            </div>
        
               
        </div>

    

</div>
 
 
     


<br>
<br>







@endsection()

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


@section('script')




@endsection()

</body>
@endsection()