<?php
require('../controlador/subir_archivo_controller.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $historial = $_FILES["historial"];

    SubirHistorial::subirArchivo($historial);
    

}


