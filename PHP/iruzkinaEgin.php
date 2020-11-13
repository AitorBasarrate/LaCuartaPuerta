<!-- Asteko filmean eta filma fitxan iruzkinak egiteko gaitasuna emango digun PHP-a -->

<?php
    /* Argitaratu botoia sakatzerakoan */
    try{
        if(isset($_POST['argitaratu'])){
        $iruzkin=$_POST['comment'];
        $erab=$_COOKIE['usuario'];
        //Aurreko php tik eongo da bai edo bai
        $idPelikula;

        //Erabiltzaile izena dugu baina ez id erabiltzaile, orduan aterako dugu...
        $miConsulta = $miPDO->prepare("SELECT iderabiltzaile from erabiltzaile where ErabiltzaileIzena='$erab'");
        $miConsulta->execute(); 
        while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //erabiltzaileId-a aterako dugu
                $idErab=$fila['iderabiltzaile'];
            echo $idErab;
            
        }
        /* Datu basearekiko konexioa, iruzkina datu basean sartzeko. */
            /* Insert-a egingo dugu */
            $miConsulta = $miPDO->prepare("INSERT into iruzkinak (iruzkina, erabiltzaile_iderabiltzaile, filmak_idPelikulak) VALUES (?,?,?)");
                /*iNTRODUCIMOS LOS VALORES A METER*/    
                $miConsulta->bindParam(1, $iruzkin);
                $miConsulta->bindParam(2, $idErab);
                $miConsulta->bindParam(3, $idPelikula);
                /* Ejecutamos */
                $miConsulta->execute(); 
                /* Decimos que se han generado correctamente */
                echo'<script>alert("Zure iruzkina gorde da!")</script>'; 

        
        }else {

            echo '<script>alert("Iruzkinak egin ahal izateko bazkide izan behar zara!")</script>';

        }
    } catch( PDOException $Exception ) {
                // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
                // String.
                throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
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
