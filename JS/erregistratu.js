/* Hemen loginaren datuak balioztatuko ditugu */
/* document.write('<?php echo include_once "include.php";?>'); */



function erabiltzaileKonp() {
    var erab=document.getElementById('erabiltzailea').value;
    /*5 karaktere gutxienez eta karaktere arraroak ez dute balio*/
    
    /* luzeegia dela frogatu */
    if (erab.length >= 5){
         /* Barruko karaktereak letrak edo   zenbakiak diren begiratuko dugu */
            if(erab.match(/[a-zA-Z0-9]+$/g)){
                   /* dena ondo badago, konprobatuko dugu datu basean ez dagoela izen hori iada erregistratuta */
                        document.getElementById('erabiltzailea').style.border='3px solid green';
                        document.getElementById('erabiltzailea').style.borderRadius='3px';
                        
                        erregistratu();
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
                document.getElementById('password1').style.border='3px solid green';
                document.getElementById('password1').style.borderRadius='3px';
                return true;
            }else {
                document.getElementById('password1').style.border='3px solid red';
                document.getElementById('password1').style.borderRadius='3px';
                return false;
            }
        }else {
            document.getElementById('password1').style.border='3px solid red';
                document.getElementById('password1').style.borderRadius='3px';
            return false;
        }
    }else{
        document.getElementById('password1').style.border='3px solid red';
                document.getElementById('password1').style.borderRadius='3px';
        return false;
    }
}
/* Pasahitzak berdin diren a la ez begiratzeko  */
function pasahitzakBerdin() { 
    
    var password1 = document.getElementById('password1').value;
    var password2 = document.getElementById('password2').value;
    if(password1===password2){
        document.getElementById('password2').style.border='3px solid green';
        document.getElementById('password2').style.borderRadius='3px';
        return true;
    }else{
        document.getElementById('password2').style.border='3px solid red';
                document.getElementById('password2').style.borderRadius='3px';
        return false;
    }

}

  /* Emailaren datuak hartzeko */
    function korreoaOndo(){
    
    var email=document.getElementById('korreoa').value;
    var patron=/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (email.match(patron)){
        document.getElementById('korreoa').style.border='3px solid green';
        document.getElementById('korreoa').style.borderRadius='3px';
        return true;
    }else{
        document.getElementById('korreoa').style.border='3px solid red';
                document.getElementById('korreoa').style.borderRadius='3px';
        return false;
    }
    
    }

  /* Dena ondo badago erregistratu botoia desblokeatuko da */
    function denaOndo() {
        var check=document.getElementById('terminoLegalak').checked;
        /* Termino legalak aukeratuta badaude... */
        if(check==true){
            var erab=erabiltzaileKonp();
            var pas1= pasahitzaKonp();
            var pas2=pasahitzakBerdin();
            var korr=korreoaOndo();
            console.log(erab);

            /* Atal guztiak beteta badaude... */
            if(erab==true && pas1==true && pas2==true && korr==true){
                        /* Datuak bidaltzeko prest dagoela esango dugu, erregistro botoia desblokeatuko da */
                        console.log('entra');
                        $('#register').prop('disabled', false);
                        return true;
            }else{ 
            /* Edozein atal ez badago beteta...Botoia blokeatu  */
                $('#register').prop('disabled', true);
                return false;
            }
        }else{
        /* Terminoak ez badaude aukeratuta... */
            $('#register').prop('disabled', true);
            return false;
        }
}
/* Gordeko dugu LocalStorage-en datuak erregistratu() funtzioarekin, web orria zabaltzean datuak gordeta izateko 
    eta gero php-ra bidliko ditugu datuak datu basean sartu ahal izateko */
function erregistratu(){
    $(document).ready(function () {

        if (!window.sessionStorage) {
            alert("not supported!");
        }

        if (sessionStorage.getItem("session_storage1") != null) {
            $("#erabiltzailea").val(sessionStorage.getItem("session_storage1"));
            $("#password1").val(sessionStorage.getItem("session_storage2"));
        }

        $("#btn1").click(function () {
            var izena=document.getElementById('erailtzailea').value;
            var pasahitza=document.getElementById('password1').value;
            sessionStorage.setItem("session_storage1", izena);
            sessionStorage.setItem("session_storage2", pasahitza);
            alert("now refresh your page");
        });

    });
    if (typeof(Storage) !== 'undefined') {
        // Código cuando Storage es compatible
       
       sessionStorage.setItem(izena,pasahitza);
    } else {
       // En el caso en el que haya 
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
