<!-- Web atal honetan behar dugun informazioa aterako dugu -->
<script src="JS/filmaIzenak.js"></script>
<?php 
    try{        
    /* Hurrengo pelikularen argazkia eta izena aterako dugu */
    $miConsulta = $miPDO->prepare("SELECT idPelikulak,Izenburuak,Argazkia,Generoa,Zuzendaria,Urtea,Sinopsis,Kritika,Balorazioa,Trailer
                                    FROM filmak WHERE idPelikulak=$idFilma");
    $miConsulta->execute(); 
    
    while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
        //Izenburua 
        $idPelikulak=$fila['idPelikulak'];
        //Izenburua 
        $izenburua=$fila['Izenburuak'];
        //Argazkiaren datua
        $argazkia=$fila['Argazkia'];
        //Generoa 
        $Generoa=$fila['Generoa'];
        //Zuzendaria 
        $Zuzendaria=$fila['Zuzendaria'];
        //Urtea 
        $Urtea=$fila['Urtea'];
        //Sinopsis 
        $Sinopsis=$fila['Sinopsis'];
        //Kritika 
        $Kritika=$fila['Kritika'];
        //Balorazioa
        $Balorazioa=$fila['Balorazioa'];
        //Trailer
        $Trailer=$fila['Trailer'];
    }

    }catch( PDOException $Exception ) {
        // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
        // String.
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    } 
    ?>