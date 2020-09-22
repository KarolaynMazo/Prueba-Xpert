<?php
require('../modelo/conversacion.php');
class Calificacion{
    
    static function calificar (){

         //recorrer el arreglo de las conversaciones 
         $conversaciones = Conversacion:: extraer_conservacion();

         var_dump($conversaciones);

         echo($conversaciones);
        
    }


}