<?php
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
include 'C:/xampp/htdocs/lacuartapuerta/PHP/dbKonexioa.php';
$linea = 0;
$izenburuak = "";
$generoak = "";
$rottenTomatoes = "";
$urtea = 0;
$arrBD()();
//Abrimos nuestro archivo
$archivo = fopen("C:/xampp/htdocs/lacuartapuerta/Media/DB/movies_metadata.csv", "r");
//Lo recorremos
while (($datos = fgetcsv($archivo, ",")) == true) {
  $num = count($datos);
  $linea = $num / 8;

$konexioa = new konexioa("localhost", "lacuartapuerta", "root", "");

$hostPDO = "mysql:host=$konexioa->hostDB;dbname=$konexioa->nombreDB;";
$miPDO = new PDO($hostPDO, $konexioa->usuarioDB, $konexioa->contrasenyaDB);
  //Recorremos las columnas de esa linea

for ($i=0; $i < $datos; $i++) { 
  for ($columna = 0; $columna < $datos[$i]; $columna++) {
        // echo $datos[$columna];
        if($columna == 0){
          $izenburuak = $datos[$i][$columna];
        }elseif ($columna == 1) {
          $generoak = $datos[$i][$columna];
        }elseif ($columna == 5) {
          $rottenTomatoes = $datos[$i][$columna];
        }elseif ($columna == 7) {
          $urtea = $datos[$i][$columna];
        }
        try {
          $kontsulta1 = $miPDO -> prepare('SELECT count(Izenburua) FROM filmak WHERE Izenburua LIKE ' . $izenburuak . ';');
        $resultado = $kontsulta1->execute();
        if ($resultado != 0) {
        break;
        }else {
          $miConsulta = $miPDO->prepare('INSERT INTO filmak (Izenburua, Generoa, Urtea, Balorazioa) VALUES ("' . $izenburuak . '", "' . $generoak . '", ' . $urtea . ', "' . $rottenTomatoes . '");');
          $miConsulta->execute();
        }
        } catch (\Throwable $th) {
            echo $th -> getMessage();
        }
    }
  }
}

/**
 * DELETE FROM `filmak` WHERE `idPelikulak` >= 0
 */
//Cerramos el archivo
fclose($archivo);
=======
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
>>>>>>> parent of 9f93860... Intento de subir a la bd
=======
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
>>>>>>> parent of 9f93860... Intento de subir a la bd
=======
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
>>>>>>> parent of 9f93860... Intento de subir a la bd
=======
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
>>>>>>> parent of 9f93860... Intento de subir a la bd
