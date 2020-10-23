<?php

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// ROOT ERABILTZAILEARI PASAHITZA ALDATZEKO XAMPPen SHELLean mysqladmin.exe -u root password WhateverPassword

// .../XAMPP/phpMyAdmin/config.inc.php ALDATU --> $cfg['Servers'][$i]['password'] = 'WhateverPassword';

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//KONEXIOA EGITEKO DATUAK - SERBITZARIA - DATU BASEAREN IZENA - ERABILTZAILEA - PASAHITZA
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
class konexioa{
    public $hostDB;
    public $nombreDB;
    public $usuarioDB;
    public $contrasenyaDB; 

    function konexioa($hostDB,$nombreDB,$usuarioDB,$contrasenyaDB){ 
        $this->hostDB = $hostDB; 
        $this->nombreDB = $nombreDB; 
        $this->usuarioDB = $usuarioDB; 
        $this->contrasenyaDB =$contrasenyaDB;
    }
}




// DB KONEXIOA
////////////////////////////////////////////////////////////////////////////////////////////////////////////
// $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
// $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);


// Create TABLE
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
// $miConsulta = $miPDO->prepare('CREATE TABLE Datos (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     Nombre VARCHAR(30) NOT NULL,
//     Apellido VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)
//     ');

// $miConsulta->execute();

?>