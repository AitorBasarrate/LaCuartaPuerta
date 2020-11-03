/* Hemen loginaren datuak balioztatuko ditugu */
/* document.write('<?php echo include_once "include.php";?>'); */



function erabiltzaileKonp() {
   
    var erab=document.getElementById('erabiltzailea').value;
    /*5 karaktere gutxienez eta karaktere arraroak ez dute balio*/
     
    /* luzeegia dela frogatu */
    if (erab.length >= 5){
         /* Barruko karaktereak letrak edo   zenbakiak diren begiratuko dugu */
            if(erab.match(/[a-zA-Z0-9]+$/g)){
                   /* dena ondo badago */
                    document.getElementById('erabiltzailea').style.borderColor='green';
                    return true;
               }else{ 
                   /* ez badago ondo... */
                   document.getElementById('erabiltzailea').style.borderColor='red';
                   return false;
                }
    }
    else{
        document.getElementById('erabiltzailea').style.borderColor='red';
        document.getElementById('erabiltzailea').focus();
        return false;
    } 
}

/*  Pasahitza balio duen a la ez */

function pasahitzaKonp(){
    
    var password = document.getElementById('password1').value;
    
    //validar longitud contraseña
    if ( password.length > 8 ) {
        //validar letra
        if ( password.match(/[A-Z]/) ) {
            //validar numero
            if ( password.match(/\d/) ) {
                document.getElementById('password1').style.borderColor='green';
                return true;
            }else {
                document.getElementById('password1').style.borderColor='red';
                return false;
            }
        }else {
            document.getElementById('password1').style.borderColor='red';
            return false;
        }
    }else{
        document.getElementById('password1').style.borderColor='red';
        return false;
    }
}
/* Pasahitzak berdin diren a la ez begiratzeko  */
 function pasahitzakBerdin() { 
    
    var password1 = document.getElementById('password1').value;
    var password2 = document.getElementById('password2').value;
    if(password1===password2){
        document.getElementById('password2').style.borderColor='green';
        return true;
    }else{
        document.getElementById('password2').style.borderColor='red';
        return false;
    }

  }

  /* Emailaren datuak hartzeko */
  function korreoaOndo(){
      
    var email=document.getElementById('korreoa').value;
    var patron=/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (email.match(patron)){
        document.getElementById('korreoa').style.borderColor='green';
        return true;
    }else{
        document.getElementById('korreoa').style.borderColor='red';
        return false;
    }
    
  }

  /* Dena ondo badago erregistratu botoia desblokeatuko da */
    function denaOndo() {
        var check=document.getElementById('terminoLegalak').checked;
        if(check==true){
            var erab=erabiltzaileKonp();
            var pas1= pasahitzaKonp();
            var pas2=pasahitzakBerdin();
            var korr=korreoaOndo();
            if(erab==true && pas1==true&& pas2==true && korr==true){
                console.log('llega');
                        /* Datuak bidali beharko ditugu php-ra */
                        $('#register').prop('disabled', false);
                    }else{ $('#register').prop('disabled', true);}
        }else{
            $('#register').prop('disabled', true);
        }
  }
/* Gordeko dugu LocalStorage-en datuak erregistratu() funtzioarekin, web orria zabaltzean datuak gordeta izateko 
    eta gero php-ra bidliko ditugu datuak datu basean sartu ahal izateko */
  function erregistratu(){
    var erab=document.getElementById('erabiltzailea').value;
    var password1 = document.getElementById('password1').value;
    var email=document.getElementById('korreoa').value;
    if (typeof(Storage) !== 'undefined') {
        // Código cuando Storage es compatible
      } else {
       // Código cuando Storage NO es compatible
      }

  }
 
 /* Sartu div-a erakutsiko duen funtzioa */
   function bazkideaSartu(id) {
 
     var sartuDiv = document.getElementById("sartu");
     var izenaEmanDiv = document.getElementById("izenaEman");
 
     if (id == "bazkideNaiz") {
         sartuDiv.style.display = "block";
         izenaEmanDiv.style.display = "none";
 
     } 
     
     if (id == "erregistratuNahi") {
         izenaEmanDiv.style.display = "block";
         sartuDiv.style.display = "none";
     } 
 
 }
