// /*Ixteko botoiaren funtzioak */
//   // Erabiltzaileak <span> (x)-an klik egiterakoan, aurreko orrira bueltatu
//   span.onclick = function() {
//       modal.style.display = "none";
//   }


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