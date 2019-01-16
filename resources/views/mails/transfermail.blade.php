<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Pago de servicio realizado</title>
</head>
<body>
    <p>Hola {{ $name }}! Se ha reportado una nueva solicitud de {{ $type }} con los siguientes datos:</p>
    <ul>
        <li>Punto de origen: {{ $from }}</li>
        <li>Punto de destino: {{ $to }}</li>
        <li>Fecha y hora: {{ $date }}</li>
        <li>descripcion: {{ $description }}</li>
        <li>Cantidad de maletas: {{ $suitcase }} unidades</li>
        <li>Costo del viaje: {{ $travelprice }} CLP</li>
        <li>Cantidad de pasajeros: {{ $passengers }} con un costo de {{ $passengerprice }} CLP</li>
        <li>Costo por guia de viaje: {{ $guideprice }} CLP</li>
        <li>Costo Total del servicio: {{ $total }} CLP</li>
    </ul>
    <p>Este correo es unico y exclusivo.  Si de casualidad recibio este correo por equivocacion, por favor elimine el mensaje.</p>
</body>
</html>