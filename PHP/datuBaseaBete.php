<?php
include("/PHP/dbKonexioa.php");
    if (isset($_SESSION['izenburuak'])) {
        $izenburuak = $_SESSION['izenburuak'];
        var_dump($izenburuak);
    }else{
        echo "que no funciona, que no"
    }
    $konexioa = new konexioa("localhost", "lacuartapuerta", "root", "")

    $hostPDO = "mysql:host=$konexioa->hostDB;dbname=$konexio->nombreDB;";
    $miPDO = new PDO($hostPDO, $konexioa->usuarioDB, $konexioa->contrasenyaDB);

    $miConsulta = $miPDO->prepare('INSERT INTO filmak (Izenburua) VALUES ("' + $izenburuak + '")');

$miConsulta->execute();
?>