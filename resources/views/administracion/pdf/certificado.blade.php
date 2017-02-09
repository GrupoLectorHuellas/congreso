
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="administration/dist/css/stylecertificado.css" media="all" />
</head>
<body style="background: url({{'http://localhost/congreso/public/uploads/'.$fondo->path}}) no-repeat scroll center;">
    <p class="nombre">{{strtoupper($inscripcion->usuario->apellidos.' '.$inscripcion->usuario->nombres)}}</p>
    <p class="evento">{{strtoupper($inscripcion->evento->nombre)}}</p>

    <div class="caja-fecha">
        <div class="caja-fecha-inicial">

       {{$inscripcion->evento->fecha_inicio}}

        </div>
        <div class="caja-fecha-final">
            {{$inscripcion->evento->fecha_fin}}

        </div>
    </div>
<div class="hora">
    {{$horas}}

</div>
    <div class="date">
        {{$date}}

    </div>
    <?php $cont = 1?>
    @foreach($evento->firmas as $firma)
        @if($cont==1)
            <div class="primera"><img  src="{{url('uploads/'.$firma->path)}}" style="width:90px;"/></div>

        @elseif($cont==2)
            <div class="segunda"><img  src="{{url('uploads/'.$firma->path)}}" style="width:90px;"/></div>

        @elseif($cont==3)
            <div class="tercera"><img  src="{{url('uploads/'.$firma->path)}}" style="width:90px;"/></div>
        @endif
        <?php $cont = $cont+1?>
    @endforeach

    <div class="caja-nombres-firmas">

    <?php $cont = 1?>
        @foreach($evento->firmas as $firma)
            @if($cont==1)
                <div class="primera-nombre">{{$firma->abreviatura.'. '.$firma->nombre.' '.$firma->apellidos}}</div>

            @elseif($cont==2)
                <div class="segunda-nombre">{{$firma->abreviatura.'. '.$firma->nombre.' '.$firma->apellidos}}</div>

            @elseif($cont==3)
                <div class="tercera-nombre">{{$firma->abreviatura.'. '.$firma->nombre.' '.$firma->apellidos}}</div>
            @endif
            <?php $cont = $cont+1?>
        @endforeach
</div>





</body>


</html>