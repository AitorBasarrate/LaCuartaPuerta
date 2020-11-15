<?php
     try{       
     /* AurreAzkenengo fitxaren datu guztiak aterako ditugu, hori izango da asteko filma
     zeren eta azkenengo sartuta dagoena, hurrengo astekoarena da */
 
 /* Filmen datu guztiak aterako ditu */
    $miConsulta = $miPDO->prepare("SELECT idPelikulak,Izenburuak,Argazkia,Generoa,Zuzendaria,Urtea,Sinopsis,Kritika,Balorazioa,Trailer
    FROM filmak order by idPelikulak DESC LIMIT 2 ");

    if ($miConsulta->execute()) {
    $fila = $miConsulta->fetchALl(PDO::FETCH_OBJ);

    foreach ($fila as $peli) {
    $idPelikula=$peli->idPelikulak;
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