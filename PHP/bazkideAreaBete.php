<!-- Web atal honetan behar dugun informazioa aterako dugu -->
   
<?php try{
        /* Hurrengo pelikularen argazkia eta izena  */

        $miConsulta = $miPDO->prepare("SELECT Izenburuak,Argazkia FROM filmak ORDER BY idPelikulak DESC LIMIT 1");
        $miConsulta->execute(); 
        
        while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
            $izenburua=$fila['Izenburuak'];
            //Render image
            $argazkia=$fila['Argazkia'];
        }
        
        /* echo '<img src="data:image/jpeg;base64,'.base64_encode( $argazkia ).'"/>'; */
           
        /* 
            $izenburua;
            $miConsulta = $miPDO->prepare("SELECT Izenburuak,Argazkia FROM filmak ORDER BY idPelikulak DESC LIMIT 1");
            $miConsulta->execute(); */
            /* array asociativo */
            
           /*  while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                echo $fila['Izenburuak'];
                $img=$fila['Argazkia'];
                //Render image
                printf($fila['Argazkia']); 
            }
            */ 
            
            
              
        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 
    /* Bazkidearen izena eta puntuazioa */
    /* Bazkideen rankingaren lehenengo iruren izena eta puntuazioa */
     /* Bazkidea ondo egiten duenean azertikoaren puntuen gehiketa */
    ?>