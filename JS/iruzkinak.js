    
function alertBoton(){
    if(buscarLocal()==false){
       alert('Bidali ahal izateko, bazkide egin behar zara. Momentuz, bakarrik irakurri');
    }else{
        comentario=document.getElementById('commit').text;
        console.log('entra1')
        if(comentario==null){
            console.log('entra2')
            alert('Eskerrik asko zure mezuagatik!');
        }else{
            console.log('entra3')
            alert('Hutsik dago, mesedez idatzi zeozer');
        }
       
    }
};