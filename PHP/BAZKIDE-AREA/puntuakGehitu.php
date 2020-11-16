<?php
//bARIABLE HAU DATU BASETIK ATERAKO ZEN
try{ 

    $erabiltzaileIzena=$_COOKIE['usuario'];
    //Erantzun ona hartuko dugu datu basetik
    $miConsulta = $miPDO->prepare("SELECT erantzuna, idPelikulak FROM BAZKIDEAREA ORDER BY idPelikulak DESC LIMIT 1");
    if ($miConsulta->execute()) {
        $fila = $miConsulta->fetchALl(PDO::FETCH_OBJ);
        foreach ($fila as $comentario) {
            $hitzOna=$comentario->erantzuna;
            $idPelikulak=$comentario->idPelikulak;
        }
    }
    $hitzOna=strtolower($hitzOna);
        if(isset($_POST["erantzunaBidali"])){
            //bEGIRATZEN DUGU EA SARTUTA DAFGOEN IADA ERANTZUNEN BAT
            $miConsulta = $miPDO->prepare("SELECT idPelikulak, idErabiltzaile FROM galderak ORDER BY idPelikulak DESC LIMIT 1");
           
            $miConsulta->execute();  
            $cuenta = $miConsulta->rowCount();
            if($cuenta!=0){
                echo '<script>alert("Ohh! '.$erabiltzaileIzena.' dagoeneko saiatu zara, hurrengo filmera itxaron")</script>';
            }else{
                //EZ BADAGO... ERANTZUN ONA ATERATZEN DUGU 
                $miConsulta = $miPDO->prepare("SELECT iderabiltzaile FROM erabiltzaile WHERE ErabiltzaileIzena='$erabiltzaileIzena'");
                $miConsulta->execute(); 
                
                while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                    //Izenburua 
                $idErab=$fila['iderabiltzaile'];
                }
                $hitza=$_POST['igarkizunErantzuna'];
                $hitza=strtolower($hitza);
                //ERANTZUNAK KONPARATZEN DITUGU
                if($hitza==$hitzOna){
                    $miConsulta = $miPDO->prepare ("INSERT INTO galderak (idPelikulak,erantzuna,idErabiltzaile) VALUES ('$idPelikulak','$hitza','$idErab')");
                    $miConsulta->execute(); 
                    $miConsulta = $miPDO->prepare("UPDATE ERABILTZAILE set puntuak=puntuak+100 where erabiltzaileizena='$erabiltzaileIzena'");
                    $miConsulta->execute(); 
                    echo '<script>alert("Correcto! '.$erabiltzaileIzena.' se te sumaran: + 100 puntos")</script>';
                }else{
                    echo '<script>alert("Ohh! '.$erabiltzaileIzena.' sai")</script>';
                }
            }
    }
    
}catch( PDOException $Exception ) {
    // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
    // String.
    throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
} 
?>
