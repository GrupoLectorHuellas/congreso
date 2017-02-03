
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link rel="stylesheet" href="administration/dist/css/stylepdf.css" media="all" />
</head>
<body>
<header class="clearfix">
    <div id="logo">
        <img src="frontend/images/logoutm.png">
    </div>
    <h1>{{strtoupper($evento->nombre)}} | {{$total_horas_evento. 'HORAS'}} | APROBADOS </h1>


</header>
<table>
    <thead>
    <tr>
        <th class="service">#</th>
        <th class="desc">IDENTIFICACIÓN</th>
        <th>NOMBRES</th>
        <th>APELLIDOS</th>
        <th>HORAS ASISTIDAS</th>
        <th>PORCENTAJE</th>
    </tr>
    </thead>
    <tbody>
        <?php $cont =0?>
        @foreach($inscripciones as $inscripcion)
        <tr>
        <td class="service">{{$cont+1}}</td>
        <td class="unit">{{$inscripcion->usuario->id}}</td>
        <td class="unit">{{strtoupper($inscripcion->usuario->nombres)}}</td>
        <td class="qty">{{strtoupper($inscripcion->usuario->apellidos)}}</td>
        <td class="total">{{$horas[$cont]}}</td>
        <td class="total">{{ round((($horas[$cont]*100)/$total_horas_evento),2).' %'}}</td>
            <?php $cont++?>
        </tr>
            @endforeach


    </tbody>
</table>
<div id="notices">
    <div>IMPORTANTE:</div>
    <div class="notice">Los usuarios solo pueden aprobar con un 70% de las horas de los eventos.</div>
</div>


</body>
</html>