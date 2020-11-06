<!-- Pelikulak+ atala pelikulez beteko dituen php-a -->
<?php 
    try{
        /* Pelikulen argazkia eta izena aterako dugu */
        $miConsulta = $miPDO->prepare("SELECT idPelikulak,Izenburuak, Argazkia FROM filmak ORDER BY Izenburuak");
        $miConsulta->execute(); 

        while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
            //Izenburua 
            $idFilma=$fila['idPelikulak'];  
            $izenburua=$fila['Izenburuak'];
            //Argazkiaren datua
            $argazkia=$fila['Argazkia'];
                echo ' 
                    <div id=peliku>
                        <a href="filmaFitxa.php?id='.$idFilma.'">
                            <img width=20% height=20% src="data:image/jpeg;base64,'.base64_encode($argazkia).'"/>
                            <label for="'.$izenburua.'" >'.$izenburua.'</label>
                        </a>
                    </div>
                ';  
        }  
    }catch( PDOException $Exception ) {
        // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
        // String.
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    } 

    // function bilaketaFiltroekin(titulua, balorazioa, generoa, urtea) {

    //     $bilaketaQuery = "SELECT * FROM filmak";
    //     $filtroak = array();
    //     $filtroakQuery;

    //     if titulua {
    //         array_push("titulua="+titulua);
    //     }

    //     if balorazioa {
    //         array_push("balorazioa="+balorazioa);
    //     }

    //     if generoa {
    //         array_push("generoa="+generoa);
    //     }

    //     if urtea {
    //         array_push("urtea="+urtea);
    //     }

        

    //     for ($i=0; $i<$filtroak[i]; $i++) {

    //         if ($i = 0){

    //             //ez du WHERE-a detektatzen??
    //             $filtroakQuery .= " WHERE " . $filtroak;

    //         } else {

    //             $filtroakQuery .= " AND " . $filtroak;

    //         }
    //     }   
    //     return $bilaketaQuery . $filtroakQuery;

    // }


?>


