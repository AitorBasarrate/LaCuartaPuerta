<?php

// Erregistratzen saiatuko den pertsonaren datuak balidatuko dira hemen

    if(isset($erabIzena) && isset($contra)) {
        $domain = "localhost";
        setcookie("erabiltzailea", $erabIzena, time()+3600, "/", $domain);
        setcookie("password1", $contra, time()+3600, "/", $domain);
        echo('crea las cookies');
    }

   /* 
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

    ); */


?>