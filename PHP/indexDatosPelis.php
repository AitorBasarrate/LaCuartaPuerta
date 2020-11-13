<?php

try{
    
    /* Filmen datu guztiak aterako ditu */
    $arrayIdFilmak=array();
    $arrayIzenburuak=array();
    $arrayArgazkiak=array();
    $miConsulta = $miPDO->prepare("SELECT idPelikulak,argazkia,Izenburuak FROM filmak order by idPelikulak desc limit 3  OFFSET 1");

    if ($miConsulta->execute()) {
    $fila = $miConsulta->fetchALl(PDO::FETCH_OBJ);
    foreach ($fila as $comentario) {
        $idFilma=$comentario->idPelikulak;
        //Argazkia 
        $argazkia=$comentario->argazkia;
        //Izenburua 
        $izenburua=$comentario->Izenburuak;
        array_push($arrayIdFilmak,$idFilma);
        array_push($arrayArgazkiak,$argazkia);
        array_push($arrayIzenburuak,$izenburua);
    }
    echo ' <script src="JS/index.js"></script>
            <div class="item1" id="item1" onmouseover="botoiHandiak(this.id)" onmouseout="botoiTxikiak(this.id)"><a href="filmaFitxa.php?id='.$arrayIdFilmak[0].'"><img  src="data:image/jpeg;base64,'.base64_encode( $arrayArgazkiak[0]).'"><p>'.$arrayIzenburuak[0].'</p></a></div>
            <div class="item2"id="item2"onmouseover="botoiHandiak(this.id)" onmouseout="botoiTxikiak(this.id)"><a href="filmaFitxa.php?id='.$arrayIdFilmak[1].'"><img src="data:image/jpeg;base64,'.base64_encode( $arrayArgazkiak[1]).'"><p>'.$arrayIzenburuak[1].'</p></a></div>
            <div class="item3"id="item3"onmouseover="botoiHandiak(this.id)" onmouseout="botoiTxikiak(this.id)"><a href="filmaFitxa.php?id='.$arrayIdFilmak[2].'"><img src="data:image/jpeg;base64,'.base64_encode( $arrayArgazkiak[2]).'"><p>'.$arrayIzenburuak[2].'</p></a></div>
        ';
}

}catch( PDOException $Exception ) {
// PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
// String.
throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
}
?>