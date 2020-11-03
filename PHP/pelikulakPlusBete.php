<!-- Pelikulak+ atala pelikulez beteko dituen php-a -->

<?php 

        try{
            /* Pelikulen argazkia eta izena aterako dugu */
            $miConsulta = $miPDO->prepare("SELECT Izenburuak,Argazkia FROM filmak ORDER BY Izenburuak");
            $miConsulta->execute(); 
        
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //Izenburua 
                $izenburua=$fila['Izenburuak'];
                //Argazkiaren datua
                $argazkia=$fila['Argazkia'];

                echo '   
                    <div id=peliku class="'.$izenburua.'" onclick="filmaIzenak(this.class);">
                        <img width=20% height=20% src="data:image/jpeg;base64,'.base64_encode( $argazkia ).'"/>
                        <label for="'.$izenburua.'" >'.$izenburua.'</label>
                    </div>
                    ';
                
            }
            
            
        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        } 

    ?>
