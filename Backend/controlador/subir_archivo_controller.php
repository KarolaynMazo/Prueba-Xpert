<?php

class SubirHistorial{
    
    static function subirArchivo($historial){

        $listo = move_uploaded_file($historial["tmp_name"],'../conversacion/conversacion.txt');

        if($listo){
        
            $arr = array('resultado' => true, 'mensaje' => "subido con exito");
            echo json_encode($arr); 
        }
        else{
            $arr = array('resultado' => false, 'mensaje' => "error subiendo el archivo");
            echo json_encode($arr);
        }
    }


}