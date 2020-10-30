/* Hemen loginaren datuak balioztatuko ditugu */
/* document.write('<?php echo include_once "include.php";?>'); */

function erabiltzaileKonp(obj) {7
    console.log('entra') ;
     document.getElementById(obj).style.color='blue'
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