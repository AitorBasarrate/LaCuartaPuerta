<?php 

        try{ 

            include 'PHP/dbKonexioa.php';
            /* pelikulaen ID, izenburua eta urtea aterako dugu */
            $miConsulta = $miPDO->prepare("SELECT idPelikulak,Izenburuak,Urtea FROM filmak");

                if ($miConsulta->execute()) {

                    $fila = $miConsulta->fetchALl(PDO::FETCH_OBJ);
                
                    foreach ($fila as $pelikula) {

                        //pelikulaaren datuak:
                        $idpelikula=$pelikula->idPelikulak;
                        $izenburuak=$pelikula->Izenburuak;
                        $urtea=$pelikula->Urtea;
                        
                        echo '
                            <div>
                                <form method="POST" action="" name="formPelikula">   
                                    <b>ID:</b><input type="number" name="idPelikula" id="idPelikula" value="'.$idpelikula.'" readonly>
                                    <p><b>Izenburua:</b> '.$izenburuak.'</p>
                                    <p><b>Urtea:</b> '.$urtea.'<p>
                                    <input type="submit" value="Ezabatu" title="delete" name="delete" class="delete" onclick="return confirm(\'Ziur '.$izenburuak.' ezabatu nahi duzula?\')"/>
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