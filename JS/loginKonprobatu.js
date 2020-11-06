/* Hemen loginaren datuak balioztatuko ditugu */
/* document.write('<?php echo include_once "include.php";?>'); */

function erabiltzaileKonp(obj) {
    /*5 karaktere gutxienez eta karaktere arraroak ez dute balio*/
     var erab=document.getElementById(obj).value;
    /* luzeegia dela frogatu */
     if (erab.length >= 5){
         /* Barruko karaktereak letrak edo   zenbakiak diren begiratuko dugu */
               if(erab.match(/[a-zA-Z0-9]+$/g)){
                   /* dena ondo badago */
                    document.getElementById(obj).style.borderColor='green'
               }else{ 
                   /* ez badago ondo... */
                   document.getElementById(obj).style.borderColor='red'
                }
    }
    else{
        document.getElementById(obj).style.borderColor='red'
        document.getElementById(obj).focus();
    } 
}
function validarContra(obj){
    //validar longitud contraseña
    var password = document.getElementById(obj).value; 
    if ( password.length < 8 ) {
        document.getElementById(obj).attributes.className='invalid';
        $('#length').removeClass('valid').addClass('invalid');
    } else {
        $('#length').removeClass('invalid').addClass('valid');
    }
    //validar letra
    if ( password.match(/[A-z]/) ) {
        $('#letter').removeClass('invalid').addClass('valid');
    } else {
        $('#letter').removeClass('valid').addClass('invalid');
    }

    //validar letra mayúscula
    if ( password.match(/[A-Z]/) ) {
        $('#capital').removeClass('invalid').addClass('valid');
    } else {
        $('#capital').removeClass('valid').addClass('invalid');
    }

    //validar numero
    if ( password.match(/\d/) ) {
        $('#number').removeClass('invalid').addClass('valid');
    } else {
        $('#number').removeClass('valid').addClass('invalid');
    }


    /* 8 karaktere gutxienez eta soilik setrak eta zenbakiak */

    var contra = document.getElementById(obj).value; 
   

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