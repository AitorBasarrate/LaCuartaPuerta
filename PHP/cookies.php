<?php

// Erregistratzen saiatuko den pertsonaren datuak balidatuko dira hemen

    if(isset($_POST["erabiltzailea"]) and isset($_POST["password1"]) and isset($_POST["korreoa"])) {
        echo('alertttt');
        $erabiltzailea = $_POST["erabiltzailea"];
        $password1 = $_POST["password1"];
        $korreoa = $_POST["korreoa"];
        $domain = "localhost";

        setcookie("erabiltzailea", $erabiltzailea, time()+3600, "/", $domain);
        setcookie("password1", $password1, time()+3600, "/", $domain);
        setcookie("korreoa", $password1, time()+3600, "/", $domain);

    } else {

        $erabiltzailea = $_COOKIE['erabiltzailea'];
        $password1 = $_COOKIE['password1'];
        $korreoa = $_COOKIE['korreoa'];
        $domain = "localhost";

    }

    //Kontsulta edo Daturak sartu
    $ErabiltzaileDatuakInsert = $miPDO->prepare('INSERT INTO erabiltzaile (
    ErabiltzaileIzena, Pasahitza, Korreoa) 
    VALUES (:ErabiltzaileIzena, :Pasahitza, :Korreoa);');

    // Insertean sartuko ditugu baloreak
    $ikasleDatuakInsert->execute (

        array (

            'ErabiltzaileIzena' => $_COOKIE['erabiltzailea'],
            'Pasahitza' => $_COOKIE['password1'],
            'Korreoa' => $_COOKIE['korreoa']

        )

    );


?>