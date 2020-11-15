<!-- Pelikulak+ ataleko generoaren filtroak beteko dituen php-a -->

<?php 

        try{

            // Aukeratutako generoak cookie bezala gorde, eta string bezala gorde gero komprobaketa egiteko
            if((isset($_POST['generoa']))) {
                $gen=$_POST['generoa'];
                $gene = implode(',',$gen);
            }

            /* Genero desberdinen lista atera */
            $miConsulta = $miPDO->prepare("SELECT DISTINCT Generoa FROM filmak");
            $miConsulta->execute(); 
        
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //Generoa 
                $generoa=$fila['Generoa'];

                //  Sortuko dugun generoa filtro bezala aukeratu baldin bada lehenago check jarri
                if ((strpos($gene, $generoa)) !== false) {

                    echo '   
                        &ensp;&ensp;&ensp;<input type="checkbox" name="generoa[]" id="'.$generoa.'" value="'.$generoa.'" checked="checked" >
                        <label for="'.$generoa.'">'.$generoa.'</label><br>
                        ';
                    
                // Bestela sortu, checked barik 
                } else {

                    echo '   
                        &ensp;&ensp;&ensp;<input type="checkbox" name="generoa[]" id="'.$generoa.'" value="'.$generoa.'"  >
                        <label for="'.$generoa.'">'.$generoa.'</label><br>
                        ';

                }
            }

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 

    ?>
