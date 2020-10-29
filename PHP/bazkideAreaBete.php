<!-- Web atal honetan behar dugun informazioa aterako dugu -->

<?php 

        try{
        /* Hurrengo pelikularen argazkia eta izena aterako dugu */
        $miConsulta = $miPDO->prepare("SELECT Izenburuak,Argazkia FROM filmak ORDER BY idPelikulak DESC LIMIT 1");
        $miConsulta->execute(); 
        
        while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
            //Izenburua 
            $izenburua=$fila['Izenburuak'];
            //Argazkiaren datua
            $argazkia=$fila['Argazkia'];
            
        }

        /* Hurrengo pelikularen igarkizun misteriotsua eta datu interesgarria aterako dugu */
        $miConsulta = $miPDO->prepare("SELECT galdera,datua FROM bazkidearea ORDER BY idPelikulak DESC LIMIT 1");
        $miConsulta->execute(); 
        
        while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
            $galdera=$fila['galdera'];
            //Render image
            $datua=$fila['datua'];
        }
        /* Bazkideen ranking-a aterako dugu */

        $miConsulta = $miPDO->prepare("SELECT ErabiltzaileIzena, puntuak FROM bazkidearea ORDER BY puntuak DESC LIMIT 3");
        $miConsulta->execute(); 
        /* Array bat sortzen dugu erantzunak gordetzeko */
        $arrayErabiltzableIzena=array();
        $arrayPuntuak=array();
        while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
          /* Variableak gordetzen ditugu */
            $erabiltzaileIzena=$fila['ErabiltzaileIzena'];
            echo "<a>$erabiltzaileIzena</a>";
            /* $puntuak=string($fila['puntuak']); */
            array_push($arrayErabiltzableIzena,$erabiltzaileIzena);
          /*   array_push($arrayPuntuak,$puntuak); */
        }

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 

    ?>
