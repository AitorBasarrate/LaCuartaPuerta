<?php

    /* Kontsulta egingo dugu ea erabiltzailea koinziditzen duen beste erregistro batekin */
        try{
            /* Genero desberdinen lista atera */
            $arrayErab=array();
            $miConsulta = $miPDO->prepare("SELECT ErabiltzaileIzena FROM erabiltzaile");
            $miConsulta->execute(); 
        
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //Izenburua 
                $erab=$fila['ErabiltzaileIzena'];
               array_push($arrayErab,$erab);
            }

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        }
?>
  
