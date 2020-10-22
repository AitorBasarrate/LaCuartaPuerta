function botoiHandiak(obj){
    document.getElementById(obj).style.backgroundColor='#f5cb5c'
}
function botoiTxikiak(obj){
    document.getElementById(obj).style.backgroundColor='#242423'
}
function alertPosibilidades(obj){
    
    var confirm= alertify.confirm('Probando confirm','Confirmar solicitud?',null,null).set('labels', {ok:'Confirmar', cancel:'Cancelar'}); 	
 
    confirm.set({transition:'slide'});   	
     
    confirm.set('onok', function(){ //callbak al pulsar botón positivo
            alertify.success('Has confirmado');
    });
     
    confirm.set('oncancel', function(){ //callbak al pulsar botón negativo
        alertify.error('Has Cancelado el dialog');
    });
}
