
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

  }

}

app.init();

      


      
