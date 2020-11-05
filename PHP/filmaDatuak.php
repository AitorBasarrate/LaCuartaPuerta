<!-- Web atal honetan behar dugun informazioa aterako dugu -->

<?php 
    $TituloPelikula = $_GET['id'];

    try{       
    /* Hurrengo pelikularen argazkia eta izena aterako dugu */
    $miConsulta = $miPDO->prepare("SELECT idPelikulak,Izenburuak,Argazkia,Generoa,Zuzendaria,Urtea,Sinopsis,Kritika,Balorazioa,Trailer
                                    FROM filmak WHERE idPelikulak=:idPelikula;");
                                    var_dump($TituloPelikula);
    $miConsulta->bindValue("idPelikula",intval($TituloPelikula));

    if ($miConsulta->execute())
    {
        $fila = $miConsulta->fetchALl(PDO::FETCH_OBJ);

        foreach ($fila as $peli) {
            $idPelikulak=$peli->idPelikulak;
            //Izenburua 
            $izenburua=$peli->Izenburuak;
            //Argazkiaren datua
            $argazkia=$peli->Argazkia;
            //Generoa 
            $Generoa=$peli->Generoa;
            //Zuzendaria 
            $Zuzendaria=$peli->Zuzendaria;
            //Urtea 
            $Urtea=$peli->Urtea;
            //Sinopsis 
            $Sinopsis=$peli->Sinopsis;
            //Kritika 
            $Kritika=$peli->Kritika;
            //Balorazioa
            $Balorazioa=$peli->Balorazioa;
            //Trailer
            $Trailer=$peli->Trailer;
        }
    }

    }catch( PDOException $Exception ) {
        // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
        // String.
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    } 
    ?>