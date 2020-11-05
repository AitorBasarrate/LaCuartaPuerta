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
        $conn = new mysqli($hostDB, $usuarioDB, $contrasenyaDB,$nombreDB);
        echo('conexion establecida');/* 
        $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB";
        echo('entra');
        $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
        echo('entra');
        printf('Connected to database<hr>'); */
        } catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            printf('error de conexion');
        }



?>