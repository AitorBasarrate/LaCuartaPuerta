<!-- Pelikulak+ ataleko iruzkinaren filtroak beteko dituen php-a -->

<?php 
        
    try{
        /* Filmen datu guztiak aterako ditu */
        $miConsulta = $miPDO->prepare("SELECT Iruzkina,filmak_idPelikulak,ErabiltzaileIzena 
                                        FROM iruzkinak INNER JOIN erabiltzaile ON iruzkinak.erabiltzaile_iderabiltzaile=erabiltzaile.iderabiltzaile 
                                        WHERE filmak_idPelikulak=:idPelikula;");
        $miConsulta->bindValue("idPelikula",intval($idPelikula));

        if ($miConsulta->execute()) {
        $fila = $miConsulta->fetchALl(PDO::FETCH_OBJ);
        foreach ($fila as $comentario) {
            $ErabiltzaileIzena=$comentario->ErabiltzaileIzena;
            //Iruzkina 
            $Iruzkina=$comentario->Iruzkina;

            echo ' 
                <div id=comentario>
                    <p id=IzenaErabiltzaile>'.$ErabiltzaileIzena.'</p>
                    <p id=IruzkinTexto>'.$Iruzkina.'</p><br>
                </div>';
        }
    }

    }catch( PDOException $Exception ) {
        // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
        // String.
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    } 

?>
