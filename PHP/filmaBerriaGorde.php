<?php
    $miConsulta = $miPDO->prepare("SELECT idPelikulak FROM filmak ORDER BY idPelikulak DESC limit 1;");
    if ($miConsulta->execute()) {
        $fila = $miConsulta->fetchALl(PDO::FETCH_OBJ);

        foreach ($fila as $comentario) {
            $idPelikulakAnterior=$comentario->idPelikulak;
        }
    }

    $sinopsis = $_POST['sinopsis'];
	$izenburua = $_POST['izenburua'];
	$trailer = $_POST['trailer'];
    $zuzendaria = $_POST['zuzendaria'];
    $generoa = $_POST['generoa'];
	$urtea = $_POST['urtea'];
	$balorazioa = $_POST['balorazioa'];
    $kritika = $_POST['kritika'];   

    $miConsulta = $miPDO->prepare ("INSERT INTO filmak (idPelikulak,Izenburuak,Generoa,Zuzendaria,Urtea,Sinopsis,Kritika,Balorazioa,Trailer)
    VALUES ($idPelikulakAnterior+1,'$izenburua','$generoa','$zuzendaria','$urtea','$sinopsis','$kritika','$balorazioa','$trailer')");
    $miConsulta->execute(); 
?>