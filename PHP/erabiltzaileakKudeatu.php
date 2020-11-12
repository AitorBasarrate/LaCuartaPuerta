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
                                
                                <style>    button, input[type="submit"] {
                                    background:url(Media/trash.png) no-repeat;
                                }</style>

                                <form method="POST" action="" name="formErab">   
                                    <input type="number" name="idErab" id="idErab" value="'.$idErabiltzaile.'" readonly>
                                    <p><b>Izena:</b> '.$erabiltzaileIzena.'</p>
                                    <p><b>Puntuak:</b> '.$puntuak.'<p>
                                    <input type="submit" value="Ezabatu" title="delete" name="delete" class="delete" onclick="return confirm(\'Ziur '.$erabiltzaileIzena.' ezabatu nahi duzula?\')"/>
                                </form>
                            </div>                             
                        ';
// <a href="PHP/erabiltzaileakEzabatu.php?id='.$idErabiltzaile.'"
                    }

                }

        }catch( PDOException $Exception ) {
                // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
                // String.
                throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 



    

?>