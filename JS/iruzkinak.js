
    if(buscarLocal()==false){
        alert('Bidali ahal izateko, bazkide egin behar zara. Momentuz, bakarrik irakurri');
        document.getElementById('argitaratu').disabled=true;
     }
function alertBoton(){
    
        comentario=document.getElementById('commit').text;
        if(comentario!=null){
            alert('Eskerrik asko zure mezuagatik!');
        }else{
            alert('Hutsik dago, mesedez idatzi zeozer');
        }
       
    }
