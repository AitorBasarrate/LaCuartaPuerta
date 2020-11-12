<?php 


        try{ 

            include 'PHP/dbKonexioa.php';
            /* Erabiltzaileen ID izena eta puntuak aterako dugu */
            $miConsulta = $miPDO->prepare("SELECT iderabiltzaile,ErabiltzaileIzena,Puntuak FROM erabiltzaile WHERE Baimenak = 1");

                if ($miConsulta->execute()) {

                    $fila = $miConsulta->fetchALl(PDO::FETCH_OBJ);
                
                    foreach ($fila as $erabiltzaile) {

                        //erabiltzailearen datuak:
                        $idErabiltzaile=$erabiltzaile->iderabiltzaile;
                        $erabiltzaileIzena=$erabiltzaile->ErabiltzaileIzena;
                        $puntuak=$erabiltzaile->Puntuak;

                        
                        echo '
                            <div>
                                <form method="POST" action="" name="formErab">   
                                    <div class="grid-container">
                                        <div class="grid-item item1">
                                            <b>ID:</b><input type="number" name="idErab" id="idErab" value="'  .$idErabiltzaile.'" readonly>
                                        </div>
                                        <div class="grid-item item2">
                                            <p><b>Izena:</b> '.$erabiltzaileIzena.'</p>
                                        </div>
                                        <div class="grid-item item3">
                                            <p><b>Puntuak:</b> '.$puntuak.'<p>
                                        </div>
                                        <div class="grid-item item4">
                                            <input type="submit" value="Ezabatu" title="delete" name="delete" class="delete" onclick="return confirm(\'Ziur '.$erabiltzaileIzena.' ezabatu nahi duzula?\')"/>
                                        </div>
                                    </div>
                                </form>
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