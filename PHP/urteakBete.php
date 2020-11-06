<!-- Pelikulak+ ataleko urtearen select filtroa beteko dituen php-a -->

<?php 

        try{
            /* Genero desberdinen lista atera */
            $miConsulta = $miPDO->prepare("SELECT DISTINCT Urtea FROM filmak ORDER BY Urtea DESC");
            $miConsulta->execute(); 
        
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //urtea 
                $urtea=$fila['Urtea'];
                    echo '
                        <option value="'.$urtea.'">'.$urtea.'</option>
                        ';
            }

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 

    ?>
