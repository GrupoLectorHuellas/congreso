@extends("layouts.base")
    @section('title')
    <title>Curso </title>
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
                  <table class="table table-bordered">
                    <tr>
                      <th class="col-md-12 text-center" colspan="5">Del {{$eventos->fecha_inicio}} al {{$eventos->fecha_fin}} </th>
                    </tr>
                    <tr>
                      <th class="col-md-1">Tema</th>
                      <th class="col-md-3">Duración en Horas</th>
                      <th class="col-md-2">Ponentes</th>
                      <th class="col-md-6">Contenido</th>
                      <th class="col-md-6">Fecha</th>
                    </tr>
                    
                    <tr>
                      <td class="col-md-1">18:00</td>
                      <td class="col-md-3">Regístro y Acreditación</td>
                      <td class="col-md-2">─</td>
                      <td class="col-md-6">─</td>
                      <td class="col-md-6">─</td>
                    </tr>

                    </table>
                    
                    
                </div>
          </div>
      </div>
       </div>

  </section>

  <!-- / SPEAKERS -->

 

 
                  
<h4 class="course__agenda__title" data-animation="fadeInUp" data-appear-top-offset="-190"> <span class="color">Ponentes</span></h4>
        

<div class="container">
            <div class="[ col-sm-4  col-md-4 ]">
                <center>
                <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="{{url('frontend/images/fotoo.jpg')}}" name="aboutme" width="140" height="140" class="img-circle"></a>
                <h3>Joe Sixpack</h3>
                <em>click my face for more</em>
                </center>
            </div>

            <div class="[ col-sm-4  col-md-4 ]">
                <center>
                <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="{{url('frontend/images/fotoo.jpg')}}" name="aboutme" width="140" height="140" class="img-circle"></a>
                <h3>Joe Sixpack</h3>
                <em>click my face for more</em>
                </center>
            </div>

            <div class="[ col-sm-4  col-md-4 ]">
                <center>
                <a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img src="{{url('frontend/images/fotoo.jpg')}}" name="aboutme" width="140" height="140" class="img-circle"></a>
                <h3>Joe Sixpack</h3>
                <em>click my face for more</em>
                </center>
            </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title" id="myModalLabel">More About Joe</h4>
                            </div>
                        <div class="modal-body">
                            <center>
                            <img src="{{url('frontend/images/fotoo.jpg')}}" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                            <h3 class="media-heading">Joe Sixpack <small>USA</small></h3>
                            <span><strong>Skills: </strong></span>
                                <span class="label label-warning">HTML5/CSS</span>
                                <span class="label label-info">Adobe CS 5.5</span>
                                <span class="label label-info">Microsoft Office</span>
                                <span class="label label-success">Windows XP, Vista, 7</span>
                            </center>
                            <hr>
                            <center>
                            <p class="text-left"><strong>Bio: </strong><br>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sem dui, tempor sit amet commodo a, vulputate vel tellus.</p>
                            <br>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <center>
                            <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough about Joe</button>
                            </center>
                        </div>
            </div>
        </div>
    </div>


  
</div>

<br>
<h4 class="course__agenda__title" data-animation="fadeInUp" data-appear-top-offset="-190"> <span class="color">Precios</span></h4>


<!-- Contenedor -->
    <div class="pricing-wrapper clearfix">
        <div class="pricing-table">
            <h3 class="pricing-title">Basico</h3>
            <div class="price">$60<sup>/ mes</sup></div>
            <!-- Lista de Caracteristicas / Propiedades -->
            <ul class="table-list">
                <li>10 GB <span>De almacenamiento</span></li>
                <li>1 Dominio <span>incluido</span></li>
                <li>25 GB <span>De transferencia mensual</span></li>
                <li>Base de datos <span class="unlimited">ilimitadas</span></li>
                <li>Cuentas de correo <span class="unlimited">ilimitadas</span></li>
                <li>CPanel <span>incluido</span></li>
            </ul>
            <!-- Contratar / Comprar -->
            <div class="table-buy">
                <p>$60<sup>/ mes</sup></p>
                <a href="#" class="pricing-action">Contratar</a>
            </div>
        </div>
 
        <div class="pricing-table recommended">
            <h3 class="pricing-title">Premium</h3>
            <div class="price">$100<sup>/ mes</sup></div>
            <!-- Lista de Caracteristicas / Propiedades -->
            <ul class="table-list">
                <li>35 GB <span>De almacenamiento</span></li>
                <li>5 Dominios <span>incluidos</span></li>
                <li>100 GB <span>De transferencia mensual</span></li>
                <li>Base de datos <span class="unlimited">ilimitadas</span></li>
                <li>Cuentas de correo <span class="unlimited">ilimitadas</span></li>
                <li>CPanel <span>incluido</span></li>
            </ul>
            <!-- Contratar / Comprar -->
            <div class="table-buy">
                <p>$100<sup>/ mes</sup></p>
                <a href="#" class="pricing-action">Contratar</a>
            </div>
        </div>
 
        <div class="pricing-table">
            <h3 class="pricing-title">Ultimate</h3>
            <div class="price">$200<sup>/ mes</sup></div>
            <!-- Lista de Caracteristicas / Propiedades -->
            <ul class="table-list">
                <li>100 GB <span>De almacenamiento</span></li>
                <li>8 Dominios <span>incluidos</span></li>
                <li>200 GB <span>De transferencia mensual</span></li>
                <li>Base de datos <span class="unlimited">ilimitadas</span></li>
                <li>Cuentas de correo <span class="unlimited">ilimitadas</span></li>
                <li>CPanel <span>incluido</span></li>
            </ul>
            <!-- Contratar / Comprar -->
            <div class="table-buy">
                <p>$200<sup>/ mes</sup></p>
                <a href="#" class="pricing-action">Contratar</a>
            </div>
        </div>
    </div>

<br>
<br>





@endsection()


@section('script')




@endsection()

</body>
@endsection()