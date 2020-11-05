<?php

/**
 * Datu basera konektatzeko php-a
 */
//KONEXIOA EGITEKO DATUAK - ZERBITZARIA - DATU BASEAREN IZENA - ERABILTZAILEA - PASAHITZA
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $hostDB = 'localhost';
        $nombreDB = 'lacuartapuerta';
        $usuarioDB = 'root';
        $contrasenyaDB = '1234';
        // DB KONEXIOAttttttttg
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        try {
        /* Con esto hace la conexion */
        //$miPDO = new mysqli($hostDB, $usuarioDB, $contrasenyaDB,$nombreDB);
        
            $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB";
            $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
            
        } catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            printf('error de conexion');
        }



?>