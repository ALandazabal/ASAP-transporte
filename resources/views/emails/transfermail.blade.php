<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Llamado de emergencia</title>
</head>
<body>
    <p>Hola! Se ha reportado un nuevo caso de emergencia a las {{ $user }}.</p>
    <p>Estos son los datos del usuario que ha realizado la denuncia:</p>
    <ul>
        <li>Nombre: {{ $user }}</li>
        <li>Teléfono: {{ $user }}</li>
        <li>DNI: {{ $user }}</li>
    </ul>
    <p>Y esta es la posición reportada:</p>
    <ul>
        <li>Latitud: {{ $user }}</li>
        <li>Longitud: {{ $user }}</li>
        <li>
            <a href="https://www.google.com/maps/dir">
                Ver en Google Maps
            </a>
        </li>
    </ul>
</body>
</html>