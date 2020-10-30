<!-- Pelikulak+ ataleko generoaren filtroak beteko dituen php-a -->

<?php 

        try{
            /* Genero desberdinen lista atera */
            $miConsulta = $miPDO->prepare("SELECT DISTINCT Generoa FROM filmak");
            $miConsulta->execute(); 
        
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //Generoa 
                $generoa=$fila['Generoa'];
                $cont = 0;

                    echo '   
                        &ensp;&ensp;&ensp;<input type="checkbox" name="generoa[]" id="'.$fila['Generoa'].'" value="'.$generoa.'">
                        <label for="'.$generoa.'">'.$generoa.'</label><br>
                        ';

            }

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 

    ?>
