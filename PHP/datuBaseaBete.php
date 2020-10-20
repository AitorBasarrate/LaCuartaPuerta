<?php
include("/PHP/dbKonexioa.php");
    $izenburuak = $_GET['izenburuak'];
    $konexioa = new konexioa("localhost", "lacuartapuerta", "root", "")

    $hostPDO = "mysql:host=$konexioa->hostDB;dbname=$konexio->nombreDB;";
    $miPDO = new PDO($hostPDO, $konexioa->usuarioDB, $konexioa->contrasenyaDB);

    $miConsulta = $miPDO->prepare('INSERT INTO filmak (Izenburua) VALUES ("' + $izenburuak + '")');

$miConsulta->execute();
    var_dump($izenburuak);
?>