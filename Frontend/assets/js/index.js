
var app = {

  init: function (){

    const btnSubir = document.getElementById('btnSubir');
    const file = document.getElementById('subir_archivo');
    
    btnSubir.addEventListener("click", () => {
    
        if(file.files.length > 0){
    
          let data = new FormData(); //un array
          data.append("historial", file.files[0]);
    
          fetch('http://localhost/prueba/Backend/servicios/historial_service.php', {
            method: 'POST',
            body: data,
    
          })
    
          .then(respuesta => respuesta.json())
          .then(response => {
           console.log(response);
           console.log(response.resultado);
           alert(response.mensaje);
          });
    
      } else {
    
          alert("Por favor selecciona un archivo");
        }
    
    });
    btnCalificar.addEventListener("click", () => {
      fetch('http://localhost/prueba/Backend/servicios/historial_service.php', {
        method: 'GET'
      })
      .then(respuesta => respuesta.json())
      .then(response => {
       console.log(response);
      // console.log(response.id);
       //alert(response.mensaje);

       //tabla estrellas 
      var cuerpo = document.getElementsByTagName("body")[0];
   
      // Crea un elemento <table> y un elemento <tbody>
      var tabla   = document.createElement("table");
      var tblcuerpo = document.createElement("tbody");
      var resultado = document.getElementById("resultado"); //id del elemento
  
     
  
          var fila = document.createElement("tr");
  
          for(var j = 0; j <4; j++){
            
            var celda = document.createElement("td");
            var conversacion = document.createTextNode(response[j].id + " = "); 
            var estrellas = document.createTextNode("Estrellas: " + response[j].estrellas);
            celda.appendChild(conversacion) + "<br>";
            fila.appendChild(celda);
            celda.appendChild(estrellas);
          }
          
          tblcuerpo.appendChild(fila);
      
          //posiciono el cuerpo en la tabla 
          tabla.appendChild(tblcuerpo);
          cuerpo.appendChild(tabla);
  
          tabla.setAttribute("id","tabla");
          tabla.setAttribute("border",2);
          tabla.setAttribute("class","centrar")
          resultado.appendChild(tabla);









    });

    
    
  
  
  
  



  })
    
  }

  

}

app.init();

      


      
