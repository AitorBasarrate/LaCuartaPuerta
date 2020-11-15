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
        
        $miConsulta = $miPDO->prepare("SELECT ErabiltzaileIzena, puntuak FROM erabiltzaile ORDER BY puntuak DESC LIMIT 3");
        $miConsulta->execute(); 
        /* Array bat sortzen dugu erantzunak gordetzeko */
        $arrayErabiltzaileIzena=array();
        $arrayPuntuak=array();

        while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
          /* Variableak gordetzen ditugu */
            $erabiltzaileIzena=$fila['ErabiltzaileIzena'];
            $erabiltzailePuntuak=$fila['puntuak'];
        
            /* Hartutako datuak, arrayetan gordetzen ditugu */
            array_push($arrayErabiltzaileIzena,$erabiltzaileIzena);
            array_push($arrayPuntuak,$erabiltzailePuntuak);
        
        }
        /* Bazkidearen datuak eta posizioa ranking-ean */
        if(isset($_COOKIE['usuario'])){
            $erabIzena=$_COOKIE['usuario'];
            
            $miConsulta = $miPDO->prepare("SELECT iderabiltzaile, Puntuak,(select count(*)+1 as ranking from erabiltzaile where puntuak>e.puntuak) as erabiltzaileRankingPos from erabiltzaile e where ErabiltzaileIzena='$erabIzena'");
            $miConsulta->execute(); 
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                
                $puntuazioa=$fila['Puntuak'];
                $ranking=$fila['erabiltzaileRankingPos'];
        }
        }
        /* Orain html-an bakarrik deituko dugu array posizioetara  */

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 

    ?>
