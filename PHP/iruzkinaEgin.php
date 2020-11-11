<!-- Asteko filmean eta filma fitxan iruzkinak egiteko gaitasuna emango digun PHP-a -->

<?php

    /* Argitaratu botoia sakatzerakoan */
    if(isset($_POST['commentform']) && isset($_POST['erabiltzaile'])) {
        echo('entra1');
        $iruzkin=$_POST['comment'];
        $erab=$_POST['izena'];
        $idPelikula = $_GET['id'];
        $idiruzkin = 70;
        /* Datu basearekiko konexioa egingo iruzkina datu basean sartzeko. */
        try{

            /* Insert-a egingo dugu */
            $miConsulta = $miPDO->prepare("INSERT into iruzkina (idIruzkinak, iruzkina, erabiltzaile_iderabiltzaile, filmak_idPelikulak) VALUES (?,?,?,?)");
                /* iNTRODUCIMOS LOS VALORES A METER */    
                $miConsulta->bindParam(1, $idiruzkin);
                $miConsulta->bindParam(2, $iruzkin);
                $miConsulta->bindParam(3, $erab);
                $miConsulta->bindParam(4, $idPelikula);
                /* Ejecutamos */
                $miConsulta->execute(); 
                /* Decimos que se han generado correctamente */
                include 'PHP/iruzkinakBete.php';
                include 'filmaFitxa.php';
                echo'<script>alert("Zure iruzkina gorde da!")</script>'; 

        } catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        }
    } else {

        echo '<script>alert("Iruzkinak egin ahal izateko bazkide izan behar zara!")</script>';

    }
?>
<script>
     
    //Erabiltzailea logueatuta dagoen edo ez konprobatuko duen kodigoa
    function logueatutaDagoJakin() {

        var erabiltzaile = localStorage.getItem('izena');
        
        $.ajax({
            type: "POST",
            url: "filmaFitxa.php",
            data: {data:erabiltzaile},
            success: function (data) {
                $('#output').html(data);
                alert(erabiltzaile);
            }
        });

    };

</script>
