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
                <th class="col-md-12 text-center" colspan="4">8 de Marzo (martes)</th>
              </tr>
              <tr>
                <th class="col-md-1">Hora</th>
                <th class="col-md-3">Titulo</th>
                <th class="col-md-2">Presenteador</th>
                <th class="col-md-6">Descripción</th>
              </tr>
              
              <tr>
                <td class="col-md-1">18:00</td>
                <td class="col-md-3">Regístro y Acreditación</td>
                <td class="col-md-2">─</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">18:30</td>
                <td class="col-md-3">Início</td>
                <td class="col-md-2">Álvaro Justen</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">18:55</td>
                <td class="col-md-3">Empezar con Python</td>
                <td class="col-md-2">Cristian Salamea</td>
                <td class="col-md-6">Conocer el ambito del lenguaje de programación para construcción de software en diferentes paradigmas.</td>
              </tr>
              
              <tr>
                <td class="col-md-1">19:25</td>
                <td class="col-md-3">Cambio de presentadores</td>
                <td class="col-md-2">─</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">19:30</td>
                <td class="col-md-3">Capturando datos: la manera Pythónica</td>
                <td class="col-md-2">Álvaro Justen</td>
                <td class="col-md-6">Web scraping y parsing: la mejor manera de hacerlo con Python. Uso de librerías para peticiones HTTP, parsing de HTML y automación de browsers con las librerías requests, tapioca-wrapper, splinter y rows.</td>
              </tr>
              
              <tr>
                <td class="col-md-1">20:00</td>
                <td class="col-md-3">Coffee break \o/</td>
                <td class="col-md-2">─</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">20:30</td>
                <td class="col-md-3">Ciencia de Datos con Python</td>
                <td class="col-md-2">Carlos De Smedt</td>
                <td class="col-md-6">Ciencia de Datos, un nuevo perfil. Revisión de conceptos: Datos, Información y Conocimiento desde un enfoque sistémico. Scrapping como fuente de datos. Ya recopillé los datos, ¿ y ahora ? / Tratamiento de Datos. Inteligencia de datos, demostración. El valor de los datos, casos de éxito desde el Growth Hacking</td>
              </tr>
              
              <tr>
                <td class="col-md-1">21:00</td>
                <td class="col-md-3">Cambio de presentadores</td>
                <td class="col-md-2">─</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">21:05</td>
                <td class="col-md-3">Charlas relámpagos (5 min)</td>
                <td class="col-md-2">5 presenteadores</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">21:35</td>
                <td class="col-md-3">Finalización</td>
                <td class="col-md-2">Álvaro Justen</td>
                <td class="col-md-6">─</td>
              </tr>
              
            </table>
            <table class="table table-bordered">
              <tr>
                <th class="col-md-12 text-center" colspan="4">9 de Marzo (miércoles)</th>
              </tr>
              <tr>
                <th class="col-md-1">Hora</th>
                <th class="col-md-3">Titulo</th>
                <th class="col-md-2">Presenteador</th>
                <th class="col-md-6">Descripción</th>
              </tr>
              
              <tr>
                <td class="col-md-1">18:00</td>
                <td class="col-md-3">Regístro y Acreditación</td>
                <td class="col-md-2">─</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">18:30</td>
                <td class="col-md-3">Início</td>
                <td class="col-md-2">Álvaro Justen</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">18:55</td>
                <td class="col-md-3">¿Hablo Python?</td>
                <td class="col-md-2">Karina Mora</td>
                <td class="col-md-6">Similar a cuando aprendemos un nuevo idioma, podemos cometer errores comunes al expresarnos en ese idioma del mismo modo que lo hacemos en nuestro idioma natal. En Python, podemos utilizar estructuras que nos parecen naturales hasta que aprendemos a hablar Python y entendemos como aprovechar mejor lo que nos ofrece este lenguaje.</td>
              </tr>
              
              <tr>
                <td class="col-md-1">19:25</td>
                <td class="col-md-3">Cambio de presentadores</td>
                <td class="col-md-2">─</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">19:30</td>
                <td class="col-md-3">De Cero a Producción en 15 min</td>
                <td class="col-md-2">David Oña</td>
                <td class="col-md-6">Se mostrara el manejo, ventajas, y herramientas de ansible automatización de aprovisionamiento de servidores remotos y seguridad anti-DDos</td>
              </tr>
              
              <tr>
                <td class="col-md-1">20:00</td>
                <td class="col-md-3">Foto oficial :D</td>
                <td class="col-md-2">─</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">20:05</td>
                <td class="col-md-3">Coffee break \o/</td>
                <td class="col-md-2">─</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">20:30</td>
                <td class="col-md-3">¿Por qué es importante la libertad en el software?</td>
                <td class="col-md-2">Quiliro Ordóñez</td>
                <td class="col-md-6">La charla resalta la importancia de usar software libre y cómo cualquier pieza de código no-libre puede afectar el balance de poder entre nosotros y los más inteligentes e influyentes.</td>
              </tr>
              
              <tr>
                <td class="col-md-1">21:00</td>
                <td class="col-md-3">Cambio de presentadores</td>
                <td class="col-md-2">─</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">21:05</td>
                <td class="col-md-3">Charlas relámpagos (5 min)</td>
                <td class="col-md-2">6 presenteadores</td>
                <td class="col-md-6">─</td>
              </tr>
              
              <tr>
                <td class="col-md-1">21:40</td>
                <td class="col-md-3">Finalización</td>
                <td class="col-md-2">Álvaro Justen</td>
                <td class="col-md-6">─</td>
              </tr>
              
            </table>
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