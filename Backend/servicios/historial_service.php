<?php
require('../controlador/subir_archivo_controller.php');
require('../controlador/calificacion_controller.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $historial = $_FILES["historial"];

    SubirHistorial::subirArchivo($historial);
    
}
if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $nueva = new Calificacion();
    $nueva->calificar();
    echo "hola mundo";
}

