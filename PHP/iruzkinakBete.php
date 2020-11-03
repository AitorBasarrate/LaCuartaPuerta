<!-- Pelikulak+ ataleko iruzkinaren filtroak beteko dituen php-a -->

<?php 

        try{
            /* Genero desberdinen lista atera */
            $miConsulta = $miPDO->prepare("SELECT DISTINCT iruzkina FROM iruzkinak");
            $miConsulta->execute(); 
        
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //iruzkina 
                $iruzkina=$fila['iruzkina'];
                $cont = 0;

                    echo '  
                    <p>'.$iruzkina.'</p><br>
                        ';

            }

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 

    ?>
