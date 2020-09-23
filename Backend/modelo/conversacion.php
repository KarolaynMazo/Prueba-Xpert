<?php

class Conversacion {

   private $mensajes;
   private $id;
   private $puntaje;
   private $estrellas;

   function __construct(){
       $this->mensajes = array();
       $this->puntaje = 0;
       $this->estrellas = 0;

    
   }

   function agregarMensaje($linea){
       array_push($this->mensajes,$linea);
       
   }

   function obtenerMensajes(){
        return $this->mensajes;
   }

   function getId(){
       return $this->id;

   }

   function setId($id){
        $this->id=$id;
   }

   function getPuntaje(){
    return $this->puntaje;
    }

    function sumarPuntaje($puntaje){
     $this->puntaje += $puntaje;
    }

   function agregarEstrellas($estrella){
        $this->estrellas = $estrella;
    }
    function getEstrellas(){
        return $this->estrellas;
    }
    function extraerConversacion(){
    
        //lee el archivo solo para lectura      
        $fp = fopen("../conversacion/conversacion.txt","rb");
        $conversacion = new Conversacion(); 
        $numeroLinea = 0;
        $listaConversaciones = array();
        while (!feof($fp)){
            $linea = fgets($fp);
            $linea = trim($linea);
            if($numeroLinea == 0){
                $conversacion->setId($linea);
            }
            else{
                if($linea != ""){
                    $conversacion->agregarMensaje($linea);
                }
            }
            $numeroLinea++;
            //. strlen(trim($linea)),  strlen logitud de la cadena, trim borra las cadenas vacias al principio y al final

            if($linea == ""){
               // echo " aqui empieza una nueva conversacion <br>"; 
                //$listaConversaciones debo agregarle la $conversacion
                array_push($listaConversaciones,$conversacion);
                $conversacion = new Conversacion(); 
                $numeroLinea = 0;
            }
        }
        array_push($listaConversaciones,$conversacion);
        return $listaConversaciones;

         fclose($fp);
  
   }
}



