<!-- Web atal honetan behar dugun informazioa aterako dugu -->
   
<?php try{
        /* Hurrengo pelikularen argazkia eta izena  */
            $izenburua;
            $miConsulta = $miPDO->prepare("SELECT Izenburua,Argazkia FROM Filmak ORDER BY idPelikulak DESC LIMIT 1");
            $miConsulta->execute();
            $resultados = $miConsulta->fetchAll();
            foreach ($resultados as $indice=>$actual){
                $izenburua=$actual['Izenburua'];
                $argazkia=$actual['pregunta'];
              }
              echo($izenburua+$argazkia);
              
        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 
    /* Bazkidearen izena eta puntuazioa */
    /* Bazkideen rankingaren lehenengo iruren izena eta puntuazioa */
     /* Bazkidea ondo egiten duenean azertikoaren puntuen gehiketa */
    ?>