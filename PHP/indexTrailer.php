<?php

try{
    /* Asteko filmaren trailerraren datua aterako dugu */
   
    $miConsulta = $miPDO->prepare("SELECT trailer FROM filmak order by idPelikulak desc limit 1  OFFSET 1");

    if ($miConsulta->execute()) {
    $fila = $miConsulta->fetchALl(PDO::FETCH_OBJ);
    foreach ($fila as $comentario) {
        /* Trailerra */
        $trailer=$comentario->trailer;
    }
}

}catch( PDOException $Exception ) {
// PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
// String.
throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
}
?>