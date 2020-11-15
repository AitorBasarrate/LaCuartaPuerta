
     //Vamos a escribir el mensaje por pantalla con DOM
            //Creamos un elemento
            var tag = document.createElement("h1");
            //Lo qe va a ir dentro
            var resultado=document.createTextNode('A que esperas para verte la pelicula?');
            //lo metemos
            tag.appendChild(resultado);
            //Creamos un elemento div
            var tag2 = document.createElement("div");
            tag2.appendChild(tag);
            elementodedespues=document.getElementById('respond')
            document.body.insertBefore(tag2, elementodedespues);