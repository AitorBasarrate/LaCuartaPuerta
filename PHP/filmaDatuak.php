<!-- Web atal honetan behar dugun informazioa aterako dugu -->

<?php 
    //Arzetikan baldin badago idPelikula, aukeratutako pelikula berria dela adierazten du.
    //Orduan filmaren id-a gordetzeko pagina errekargatzean (id-a hartzen delako soilik klik egitean, baina ez da gordetzen komntatu ostean adibidez)...
    if(isset($_GET['id'])){
        $domain = "localhost";
        //Aurreko pelikularen cookia ezabatzen dugu egotekotan...
        if(isset($_COOKIE['idPelikula'])){
             setcookie ("idPelikula", "", time() - 3600,$domain);
        }
        //berriro cookia sortzen dugu baina pelikula honekin
        $idPelikula= $_GET['id'];
        setcookie("idPelikula", $idPelikula, time()+3600, "/", $domain);
    }else{
        //Ezbadago id aurreko pelikula dela esan nahi du; Cookia hartu eta variablean sartuko dugu
        $idPelikula= $_COOKIE['idPelikula'];

    }

    try{       
    /* Filmen datu guztiak aterako ditu */
    $miConsulta = $miPDO->prepare("SELECT idPelikulak,Izenburuak,Argazkia,Generoa,Zuzendaria,Urtea,Sinopsis,Kritika,Balorazioa,Trailer
                                    FROM filmak WHERE idPelikulak=:idPelikula;");
    $miConsulta->bindValue("idPelikula",intval($idPelikula));

    if ($miConsulta->execute()) {
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