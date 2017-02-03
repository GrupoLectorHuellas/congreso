
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="administration/dist/css/stylecertificado.css" media="all" />
</head>
<body style="background: url(http://localhost/congreso/public/administration/img/certificado.jpg) no-repeat scroll center;">
<p class="nombre">CASTILLO CASTILLO LUIS FERNANDO</p>
<p class="evento">MATEMATICAS FINACIERAS</p>

<p class="fecha">2016-10-10</p>
<?php $cont = 1?>
@foreach($firmas as $firma)
    @if($cont==1)
        <div class="primera"><img  src="{{url('uploads/'.$firma->path)}}" style="width:90px;"/></div>

    @elseif($cont==2)
        <div class="segunda"><img  src="{{url('uploads/'.$firma->path)}}" style="width:90px;"/></div>

    @elseif($cont==3)
        <div class="tercera"><img  src="{{url('uploads/'.$firma->path)}}" style="width:90px;"/></div>
    @endif
    <?php $cont = $cont+1?>
     @endforeach


</body>


</html>