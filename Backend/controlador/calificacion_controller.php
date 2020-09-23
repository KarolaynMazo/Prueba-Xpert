<?php
require('../modelo/conversacion.php');
class Calificacion{
    
  function calificar (){
     
    //recorrer el arreglo de las conversaciones 
    $conversacion = new Conversacion();
    $Listaconversaciones = $conversacion->extraerConversacion();

    foreach($Listaconversaciones as $posicion =>$conversacion){
//----------si abandono la conversacion---------
      if(sizeof($conversacion->obtenerMensajes()) == 1){
        $conversacion->sumarPuntaje(-100);
      }  
//---------- Numero de mensajes enviados--------------------
      if(sizeof($conversacion->obtenerMensajes()) <= 5){
        $conversacion->sumarPuntaje(20);
      }
      else{
        $conversacion->sumarPuntaje(10);
      }
//---Numero de coincidencias de la palabra urgente
$stringMensajes = implode($conversacion->obtenerMensajes());
$contadorPalabras = substr_count($stringMensajes,"URGENTE");
if($contadorPalabras <= 2){
  $conversacion->sumarPuntaje(-5);
}else{
  $conversacion->sumarPuntaje(-10);
}




//--------Lista de palabras que exclaman un buen servicio
      $terminarCalificar = false;
      foreach($conversacion->obtenerMensajes() as $posicion => $palabra){
        if($coincidencia = strrpos($palabra,"EXCELENTE SERVICIO")){
          $conversacion->sumarPuntaje(100);
          $terminarCalificar = true;
        }
        if(!$terminarCalificar){
          if( $coincidencia = strrpos($palabra,"Gracias") || $coincidencia = strrpos($palabra,"buena atención") ||
          $coincidencia = strrpos($palabra,"Muchas Gracias")){
          $conversacion->sumarPuntaje(10);
          }
        }
     
      }

 //-----------Tiempo en los mensajes-------------------------------------------------------------   
    if(!$terminarCalificar){
      $HoraInicial = substr($stringMensajes,0,8);
      $HoraFinal = substr($palabra,0,8);
      list($hora,$min,$seg) = explode(":",$HoraInicial);
      list($hora2,$min2,$seg2) = explode(":",$HoraFinal);
      $resultadomin = $min2 - $min;
      $resultado =$seg2 - $seg;
      if($resultadomin > 0){
        $resultado = $resultado + $resultadomin * 60;
      }
     // echo $resultado . "<br>";
      if($resultado <= 60){
        $conversacion->sumarPuntaje(50);
      }else{
        $conversacion->sumarPuntaje(25);
      }
    }
      //var_dump($conversacion);
      calcularEstrellas($conversacion);
    }

   $array = array();
  foreach($Listaconversaciones as $posicion =>$conversacion){
    $arr = array('id' => $conversacion->getId(), 'puntaje' => $conversacion->getPuntaje(),'estrellas' => $conversacion->getEstrellas() );
    array_push($array,$arr);
  }
  echo json_encode($array); 
  exit;
  }
}

function calcularEstrellas($conversacion){
 $puntaje = $conversacion->getPuntaje();
  if($puntaje < 0){
    $conversacion->agregarEstrellas(0);
  }
  else{
      if($puntaje < 25){
        $conversacion->agregarEstrellas(1);
      }
      else{
          if($puntaje >= 25 &&  $puntaje < 50){
            $conversacion->agregarEstrellas(2);
          }
          else{
            if($puntaje >= 50 && $puntaje < 75){
              $conversacion->agregarEstrellas(3);
            }
            else{
              if($puntaje >=75 && $puntaje <90){
                $conversacion->agregarEstrellas(4);
              }
              else{
                $conversacion->agregarEstrellas(5);
              }
            }
          }
      }
  } 
  

}




