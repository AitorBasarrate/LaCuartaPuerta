<?php 

        try{ 

            include 'PHP/dbKonexioa.php';
            /* Erabiltzaileen ID izena eta puntuak aterako dugu */
            $miConsulta = $miPDO->prepare("SELECT iderabiltzaile,ErabiltzaileIzena,Puntuak FROM erabiltzaile WHERE Bimenak = 1");

                if ($miConsulta->execute()) {

                    $fila = $miConsulta->fetchALl(PDO::FETCH_OBJ);
                
                    foreach ($fila as $erabiltzaile) {

                        //erabiltzailearen datuak:
                        $idErabiltzaile=$erabiltzaile->iderabiltzaile;
                        $erabiltzaileIzena=$erabiltzaile->ErabiltzaileIzena;
                        $puntuak=$erabiltzaile->Puntuak;

                        echo '
                            <div>   
                                <p><b>ID:</b> '.$idErabiltzaile.'</p>
                                <p><b>Izena:</b> '.$erabiltzaileIzena.'</p>
                                <p><b>Puntuak:</b> '.$puntuak.'<p>
                                <a href="#" title="delete" class="delete" onclick="return confirm("Ziur $erabiltzaileIzena ezabatu nahi duzula?")"><img  src="Media/trash.png"></a>
                            </div>                             
                        ';

                    }

                }

        }catch( PDOException $Exception ) {
                // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
                // String.
                throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 



?>