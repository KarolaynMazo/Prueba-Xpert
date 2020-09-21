<?php

class Conversacion {
    private $id; // id de la conversacion
    private $cliente;
    private $asesor;
    private $mensaje;


    function __construct($id){
        $this-> id = $id;
        $this-> extraer_conversacion();

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

    extraer_conversacion($historial){
        //leer arhi y convertirlo en listado 

    }



}