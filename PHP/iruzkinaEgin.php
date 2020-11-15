<!-- Asteko filmean eta filma fitxan iruzkinak egiteko gaitasuna emango digun PHP-a -->

<?php
    /* Argitaratu botoia sakatzerakoan */
    try{
        //Botoia sakatzean...
        if(isset($_POST['Argitaratu'])){
            $iruzkin=$_POST['comment'];
            $erab=$_COOKIE['usuario'];
                //Iruzkina ezbadago hutsik eta erabiltzailea logeatuta baldin badago
                if($iruzkin!=''){
                        echo'Entra3';
                    //Aurreko php tik eongo da variablea bai edo bai kadenan pasatzen delako.
                    $idPelikula;
                    //Erabiltzaile izena dugu baina ez id erabiltzaile, orduan aterako dugu...
                    $miConsulta = $miPDO->prepare("SELECT iderabiltzaile from erabiltzaile where ErabiltzaileIzena='$erab'");
                    $miConsulta->execute(); 
                    while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                            //erabiltzaileId-a aterako dugu
                            $idErab=$fila['iderabiltzaile'];
                        
                    }
                    /* Iruzkina datu basean sartzeko... */
                        /* Insert-a egingo dugu */
                        $miConsulta = $miPDO->prepare("INSERT into iruzkinak (iruzkina, erabiltzaile_iderabiltzaile, filmak_idPelikulak) VALUES (?,?,?)");
                            /*iNTRODUCIMOS LOS VALORES A METER*/    
                            $miConsulta->bindParam(1, $iruzkin);
                            $miConsulta->bindParam(2, $idErab);
                            $miConsulta->bindParam(3, $idPelikula);
                            /* Ejecutamos */
                            $miConsulta->execute(); 
                            /* La consulta se ha ejecutado correctamente*/

                
                }else{echo '<script>alert("Zire iritzia ezin da hutsik egon!")</script>';}
            }else{
                echo '<script>alert("Ezin duzu iritzirik idazti. Egin bazkide!")</script>';
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
