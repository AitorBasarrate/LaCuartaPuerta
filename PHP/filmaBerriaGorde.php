<?php

    require_once 'dbKonexioa.php';

   /*  $miConsulta = $miPDO->prepare("SELECT idPelikulak FROM filmak ORDER BY idPelikulak DESC limit 1;");
    if ($miConsulta->execute()) {
        $fila = $miConsulta->fetchALl(PDO::FETCH_OBJ);

        foreach ($fila as $comentario) {
            $idPelikulakAnterior=$comentario->idPelikulak+1;
        }
    }  */    


    $statusMsg = '';

        if(!empty($_FILES["argazkia"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["argazkia"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                
                $image = $_FILES['argazkia']['tmp_name']; 
                $argaz = addslashes(file_get_contents($image)); 
        
            }else{ 
                $statusMsg = 'JPG, JPEG, PNG, eta GIF artxiboak igo ditzakezu soilik.'; 
            } 
        }

    
// Display status message 
echo $statusMsg; 
    
    $sinopsis = $_POST['sinopsis'];
	$izenburua = $_POST['izenburua'];
	$trailer = $_POST['trailer'];
    $zuzendaria = $_POST['zuzendaria'];
    $generoa = $_POST['generoa'];
	$urtea = $_POST['urtea'];
	$balorazioa = $_POST['balorazioa'];
    $kritika = $_POST['kritika'];   

    $datua = $_POST['datua'];
	$galdera = $_POST['galdera'];
    $erantzuna = $_POST['erantzuna'];   

    $miConsulta = $miPDO->prepare ("INSERT INTO filmak (Izenburuak,Argazkia,Generoa,Zuzendaria,Urtea,Sinopsis,Kritika,Balorazioa,Trailer)
    VALUES ($izenburua','$argaz','$generoa','$zuzendaria','$urtea','$sinopsis','$kritika','$balorazioa','$trailer')");
    $miConsulta->execute(); 

    $miConsulta = $miPDO->prepare ("INSERT INTO bazkidearea (idPelikulak,galdera,erantzuna,datua)
    VALUES ($idPelikulakAnterior,'$galdera','$erantzuna','$datua')");
    $miConsulta->execute(); 
?>