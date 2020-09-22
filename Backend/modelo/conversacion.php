<?php

class Conversacion {
    private $id; // id de la conversacion
    private $cliente;
    private $asesor;
    private $mensajes;
   


    function __construct($id){
        $this->id = $id;
        $this->extraerConversacion();
        $this->mensajes = array();

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
}

extraerConversacion();

function static  extraerConversacion (){
    
    //lee el archivo solo para lectura      
    $fp = fopen("../conversacion/conversacion.txt","rb");
    $conversacion = new Conversacion(); 
    $listaConversaciones = array();

    //conversacion -> agregarMensaje($linea), array push 
    while (!feof($fp)){
        $linea = fgets($fp);
        $linea = trim($linea);
        $conversacion -> agregarMensaje($linea)
        echo $linea . "<br>" ;
        //. strlen(trim($linea)),  strlen logitud de la cadena, trim borra las cadenas vacias al principio y al final

        if($linea == ""){

            echo " aqui empieza una nueva conversacion <br>"; 
            //$listaConversaciones debo agregarle la $conversacion
            $conversacion = new Conversacion(); 
        }
    }
    return $listaConversaciones;

    //conversacion 1
   // for ($i = 0; $i<6; $i++){
     //   $mensaje = fgets($fp);//mensaje de cada linea
        //echo $mensaje;
       // $saltoDeLinea = nl2br($mensaje); 
       // echo $saltoDeLinea;
     //   $arr = array( $i => $mensaje, => $saltoDeLinea);
       // echo json_encode($arr); 
   
   // }
/*
    //conversacion 2
    for ($i = 7; $i<17; $i++){
        $mensaje = fgets($fp);//mensaje de cada linea
        $saltoDeLinea = nl2br($mensaje); 
        echo $saltoDeLinea;
       // $arr = array( $i => $mensaje, => $saltoDeLinea);
            echo json_encode($arr); //
    }

    //conversacion 3 

    for ($i = 18; $i<25; $i++){
        $mensaje = fgets($fp);//mensaje de cada linea
        $saltoDeLinea = nl2br($mensaje); 
        echo $saltoDeLinea;
       // $arr = array( $i => $mensaje, => $saltoDeLinea);
         //   echo json_encode($arr); 
    }

    // conversacion 4 
    for ($i = 26; $i<30; $i++){
        $mensaje = fgets($fp);//mensaje de cada linea
        $saltoDeLinea = nl2br($mensaje); 
        echo $saltoDeLinea;
       // $arr = array( $i => $mensaje, => $saltoDeLinea);
         //   echo json_encode($arr); 
    }
*/
  
    
    
       // }

   // while(!feof($fp)){
       //$mensaje = fgets($fp);//mensaje de cada linea
      //  if($mensaje !== "CLIENTE"){

          //  fwrite($c1,$mensaje .PHP_EOL);
          
          //  echo $saltoDeLinea;
       // }
            
          
        
         // $cadena = file("../conversacion/conversacion.txt");
         // print_r($cadena);
        //  fwrite($c1,$cadena .PHP_EOL);
       //    $listo = $cadena;
           //     echo $listo;
             
           //}    

           
       
     
   

    fclose($fp);
  
   }
