<?php

    include_once ("dbKonexioa.php");
    if(isset($_POST['btn2'])){

        $erabiltzaile = $_POST['erabiltzaile'];
        $pasahitza = $_POST['pasahitza1'];
        $getErabiltzaile = $miPDO->prepare("SELECT ErabiltzaileIzena FROM erabiltzaile WHERE ErabilzaileIzena LIKE '" . $erabiltzaile . "';");
        $getPasahitza = $miPDO->prepare("SELECT Pasahitza FROM erabiltzaile WHERE Pasahitza LIKE '" . $pasahitza . "';");
        $getErabiltzaile->execute();
        $getPasahitza->execute();

        while($fila = $getErabiltzaile->fetch(PDO::FETCH_ASSOC)){
            if($getErabiltzaile == $erabiltzaile && $getPasahitza == $pasahitza){
                echo ("<script>alert 'Superdeputamadresocio'");
            }else{
                echo ("<script>alert 'La cagaste wey'");
            }
        }
    }
