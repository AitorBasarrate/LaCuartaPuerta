<!-- Pelikulak+ ataleko generoaren filtroak beteko dituen php-a -->

<?php 

        try{

            if((isset($_POST['generoa']))) {
                $gen=$_POST['generoa'];
                $gene = implode('-',$gen);

            }

            /* Genero desberdinen lista atera */
            $miConsulta = $miPDO->prepare("SELECT DISTINCT Generoa FROM filmak");
            $miConsulta->execute(); 
        
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //Generoa 
                $generoa=$fila['Generoa'];

                    // echo '   
                    // &ensp;&ensp;&ensp;<input type="checkbox" name="generoa[]" id="generoa" value="'.$generoa.'" '. if (in_array($generoa, $gen))echo "checked";.' >
                    //     <label for="'.$generoa.'">'.$generoa.'</label><br>
                    //     ';

                    // https://stackoverflow.com/questions/10920821/set-checkbox-checked-state-based-on-array-values

                }
                for ($i = 0; $i < count($gen); $i++){
                    if($gen($i) == null){
                      echo '   
                        &ensp;&ensp;&ensp;<input type="checkbox" name="generoa[]" id="generoa" value="'.$generoa.'">
                        <label for="'.$generoa.'">'.$generoa.'</label><br>
                        ';
                    }else{
                        echo '   
                        &ensp;&ensp;&ensp;<input type="checkbox" name="generoa[]" id="generoa" value="'.$gen($i).'">
                        <label for="'.$gen($i).'">'.$gen($i).'</label><br>
                        ';
                    }
                }

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 

    ?>
