<?php

// Logeatzen saiatuko den pertsonaren datuak balidatuko dira hemen

    if(isset($_POST["erabiltzailea"]) and isset($_POST["password1"])) {

        $erabiltzailea = $_POST["erabiltzailea"];
        $password1 = $_POST["password1"];
        $domain = "localhost";

        setcookie("erabiltzailea", $erabiltzailea, time()+3600, "/", $domain);
        setcookie("password1", $password1, time()+3600, "/", $domain);

    } else {

        $erabiltzailea = $_COOKIE['erabiltzailea'];
        $password1 = $_COOKIE['password1'];
        $domain = "localhost";

    }

    try{

            $miConsulta = $miPDO->exec("SELECT ErabiltzaileIzena, Pasahitza 
                                            FROM erabiltzaile 
                                            WHERE ErabiltzaileIzena 
                                            LIKE " . $_COOKIE['erabiltzailea'] . 
                                            " AND Pasahitza 
                                            LIKE " . $_COOKIE['password1'] . ";"
                                            );
            $kontsultaErantzuna = $miPDO->query($miConsulta);

            
            //Lerro bat itzultzen baldin badu, erabiltzailea existitzen dela esan nahiko du
            if ($kontsultaErantzuna == 1) {

                echo "LOGEATUTA";                   
                
            } 
            
        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 




?>