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
                                    <div class="grid-container">
                                        <div class="grid-item item1"> 
                                            <b>ID:</b><input type="number" name="idPelikula" id="idPelikula" value="'.$idpelikula.'" readonly>
                                        </div>
                                        <div class="grid-item item2">
                                            <p class="izenburua"><b>Izenburua:</b> '.$izenburuak.'</p>
                                        </div>
                                        <div class="grid-item item3">
                                            <p><b>Urtea:</b> '.$urtea.'<p>
                                        </div>
                                        <div class="grid-item item4">
                                            <img class="trash" src="Media\trash.png">
                                            <input type="submit" value="Ezabatu" title="delete" name="delete" class="delete" onclick="return confirm(\'Ziur '.$izenburuak.' ezabatu nahi duzula?\')"/>
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