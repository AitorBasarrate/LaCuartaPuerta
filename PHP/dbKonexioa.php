<?php

/**
 * Datu basera konektatzeko klasea
 */
//KONEXIOA EGITEKO DATUAK - SERBITZARIA - DATU BASEAREN IZENA - ERABILTZAILEA - PASAHITZA
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////



        $hostDB = 'localhost';
        $nombreDB = 'lacuartapuerta';
        $usuarioDB = 'root';
        $contrasenyaDB = '1234';
        // DB KONEXIOA
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        try {
            /* Con esto hace la conexion */
        $conn = new mysqli($hostDB, $usuarioDB, $contrasenyaDB,$nombreDB);
        $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB";
        $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
        } catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            printf('error de conexion');
        }


/* class konexioa{
    public $hostDB;
    public $izenaDB;
    public $erabiltzaileaDB;
    public $pasahitzaDB; 
    /**
     * konstruktorea, objetua sortzerakoan atributu hauek bete beharko dira.
     */
    /* 
    function konexioa($hostDB,$izenaDB,$erabiltzaileaDB,$pasahitzaDB){ 
        $this->hostDB = $hostDB; 
        $this->izenaDB = $izenaDB; 
        $this->erabiltzaileaDB = $erabiltzaileaDB; 
        $this->pasahitzaDB =$pasahitzaDB;
    }
}

 */
/**
 * Objetua sortu ondoren hemen beheko bilerro hauek sartu behar dira kodean.
 */
//$hostPDO = "mysql:host=$obj->hostDB;dbname=$obj->izenaDB;";
//$miPDO = new PDO($hostPDO, $erabiltzaileaDB, $pasahitzaDB);


// Create TABLE
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
// $miConsulta = $miPDO->prepare('CREATE TABLE Datos (
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     Nombre VARCHAR(30) NOT NULL,
//     Apellido VARCHAR(30) NOT NULL,
//     email VARCHAR(50),
//     reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)
//     ');

/**
 * Query-a exekutatzeko.
 */
//$miConsulta->execute();

?>