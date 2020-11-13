<!-- Pelikulak+ ataleko urtearen select filtroa beteko dituen php-a -->

<?php 

        try{

            if(isset($_POST['urtea'])) {     
                $aukeratuta=$_POST['urtea'];
                
                echo $aukeratuta;
            }

            /* Genero desberdinen lista atera */
            $miConsulta = $miPDO->prepare("SELECT DISTINCT Urtea FROM filmak ORDER BY Urtea DESC");
            $miConsulta->execute(); 
            echo'<option value=""></option>';
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //urtea 
                $urtea=$fila['Urtea'];
                    echo '
                        <option value="'.$urtea.'" '. ($aukeratuta === $urtea ? ' selected="selected"' : '').'>'.$urtea.'</option>
                        ';
            }

            // <option value="'.$urtea.'">'.$urtea.'</option>

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 

    ?>
