<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Constancia</title>
    <style>
        .col-md-6 {
            width: 50%; /* Ancho fijo para cada columna */
            float: left; /* Flota cada columna a la izquierda */
            box-sizing: border-box; /* Asegura que el padding y border estén incluidos en el ancho */
        }
        .clear-fix {
            clear: both; /* Asegura que no haya elementos flotantes después de estos elementos */
        }
        /* Estilos adicionales para la visualización de los textos */
        .col-md-6 p {
            margin: 0; /* Elimina el margen predeterminado de los párrafos */
            padding: 10px; /* Añade algo de padding para evitar que el texto toque los bordes del `div` */
        }
        .col-md-6:first-child {
            background-color: blue; /* Fondo azul para la primera columna */
            color: white; /* Texto blanco para la primera columna */
        }
        .col-md-6:last-child {
            background-color: grey; /* Fondo gris para la segunda columna */
            color: black; /* Texto negro para la segunda columna */
        }
    </style>
</head>
<body>

<div class="row mt-5 mb-5">
    <div class="col-md-6">
        <p>Dr. Ricardo Fletes Corona</p>
        <p>Jefe del Departamento de Desarrollo Social</p>
    </div>
    <div class="col-md-6">
        <p>Mtra. María Rosas Moreno</p>
        <p>Coordinadora de Carrera de la NILITS</p>
    </div>
    <div class="clear-fix"></div> <!-- Clear fix para asegurarnos de que el flujo del documento continúa normalmente después de los elementos flotantes -->
</div>

</body>
</html>
