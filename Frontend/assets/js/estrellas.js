



function mostrar_tabla(){
   
    var cuerpo = document.getElementsByTagName("body")[0];
 
    // Crea un elemento <table> y un elemento <tbody>
    var tabla   = document.createElement("table");
    var tblcuerpo = document.createElement("tbody");
    var resultado = document.getElementById("resultado"); //id del elemento

    for(var i = 0;i < 2; i++) {

        var fila = document.createElement("tr");

        for(var j = 0; j <5; j++){
             
            var columna = document.createElement("td");
            // lo que lleva la tabla
            var estrella  = document.createTextNode("*");
            var puntos = document.createTextNode("puntos"+" "+"*"); 
            columna.appendChild(estrella);
            fila.appendChild(puntos);
        }
        tblcuerpo.appendChild(fila);
    }
        //posiciono el cuerpo en la tabla 
        tabla.appendChild(tblcuerpo);
        cuerpo.appendChild(tabla);

        tabla.setAttribute("id","tabla");
        tabla.setAttribute("border",2);
        tabla.setAttribute("class","centrar")
        resultado.appendChild(tabla);



}