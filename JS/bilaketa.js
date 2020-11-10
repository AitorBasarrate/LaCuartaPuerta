$("#pelikulaIzenezBilatu").click(function(){});
$('[name="star"]').click(function(){});
$("#generoa").change(function(){});
$("#urtea").change(function(){});
$('#customIDtoInputtypeFile').change(function(){});

$(function() {
    $("input:file").change(function (){
        alert('entrajs')
      $('form').submit();
    });
   });

/* function llamarPhp(obj){
    console.log('pelikulakPlusBete.php? name='+ obj);
} */
/* $(function() { */

    // Bilaketa filtroetako baten batean aldaketa bat baldin badago
    // hurrengo funtzioari deitzen zaio

    // CSS-an bezalaxe ID-ei deitzen zaie, hauetan aldaketa bat dagoenean funtzioa exekutatu
   /*  $("#pelikulaIzenezBilatu").keyup(function (e) {  */
        // Konstanteetan sartutakoaren balioa sartuko dira:
        // Tituluaren konstantea
      
        // Ajax funtzioa
        /* $.ajax({

            // Beharrezko aldagaiak betetzen ditugu
            type: "POST",
            url: "PHP/pelikulakPlusBilaketa.php",
            data: {value:bilaketa},
            dataType: "json",

            // Konexioa ondo egin bada hurrengo kodigoa exekutatuko da
            success: function (response) {

                // console.log(response);

                // Pelikulak desagertzen direnerako animazioa
                $("#pelikula-lista").fadeOut("fast", function () {
                    $("#pelikula-lista").empty();    
                });

                // Kontsultak itzulitako pelikulen array-a jaso eta banan-banan aterako ditu
                for (let i = 0; i < response.data.length; i++) {
                    const element = response.data[i].peli;
                    // Pelikulak desagertzen direnerako animazioa
                    $("#pelikula-lista").fadeIn("slow" ,function () {
                        // pelikula bakoitza pelikula-listaren DIV-ean kokatzen da 
                        $("#pelikula-lista").append(element);
                    });
                }
            },

            // Aldiz, konexioa errorerenbat ematen badu kodigo hau exekutatuko da
            error: function (error) {
                console.log(error);
            }
        }); */
 /*    });
}); */