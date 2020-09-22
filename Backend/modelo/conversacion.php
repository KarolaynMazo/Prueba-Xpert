<?php

class Conversacion {
    private $id; // id de la conversacion
    private $cliente;
    private $asesor;
    private $mensajes;
    private $listaConversaciones;
   


    function __construct($id){
        $this->id = $id;
        $this->extraerConversacion();
        $this->mensajes = array();
        $this->listaConversaciones = array();

    }

    function getId(){
        return $id;
    }

    function getCliente(){
        return $cliente;
    }

    function getAsesor(){
        return $asesor;
    }

    function setId($id){
        $this->id =$id;
    }

    function setCliente($cliente){
        $this->cliente =$cliente;
    }

    function setAsesor($asesor){
        $this->asesor =$asesor;
    }

    function agregarMensaje($linea){
        array_push($mensajes,$linea);
    }

    function agregarConversacion($conversacion){
        array_push($listaConversaciones,$conversacion);
    }




  static function extraerConversacion(){
    
    //lee el archivo solo para lectura      
    $fp = fopen("../conversacion/conversacion.txt","rb");
    $conversacion = new Conversacion(); 
    $listaConversaciones = array();

    //conversacion -> agregarMensaje($linea), array push 
    while (!feof($fp)){
        $linea = fgets($fp);
        $linea = trim($linea);
        $conversacion -> agregarMensaje($linea);
        echo $linea . "<br>" ;
        //. strlen(trim($linea)),  strlen logitud de la cadena, trim borra las cadenas vacias al principio y al final

        if($linea == ""){

            echo " aqui empieza una nueva conversacion <br>"; 
            //$listaConversaciones debo agregarle la $conversacion
            $conversacion = new Conversacion(); 
        }
    }
    return $listaConversaciones;

    fclose($fp);
  
   }
}
