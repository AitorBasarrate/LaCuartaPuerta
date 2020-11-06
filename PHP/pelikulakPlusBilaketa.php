<?php
    //Datu baseari konexioa deituko diogu 
    require_once("dbKonexioa.php");

    // bilaketa.js-tik jasotako bilaketa filtroak jaso 
    if ($_POST && !empty($_POST['value']))
    {
        $response = array("status" => "" );

        // Kontsulta egin jasotako parametroak WHERE-ean jarriz
        $miConsulta = $miPDO->prepare("SELECT * FROM filmak WHERE Izenburuak LIKE :titulo");

        // Exekutatzen bada eta zerbait itzultzen badu
        if ($miConsulta->execute(["titulo" => "%".$_POST['value']."%"])) {
            $response['status'] = "OK";
            $response['data'] = array();

            // Pelikularen datuak hartu, div indibidual bat sortuko du pelikula bakoitzerako
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //Izenburua 
                $idFilma=$fila['idPelikulak'];  
                $izenburua=$fila['Izenburuak'];
                //Argazkiaren datua
                $argazkia=$fila['Argazkia'];
                $div = ' 
                        <div id=peliku>
                            <a href="filmaFitxa.php?id='.$idFilma.'">
                                <img width=20% height=20% src="data:image/jpeg;base64,'.base64_encode($argazkia).'"/>
                                <label for="'.$izenburua.'" >'.$izenburua.'</label>
                            </a>
                        </div>
                    ';

                // Pelikula bakoitza (indibidualki beraien div-arekin) array batean sartuta pasako dira
                // json bidez bilaketa.js-ra, honek deskodifikatzeko
                array_push($response['data'],["peli" => $div]);
            }
        // Errorerenbat ematekotan kodigo zati hau exekutatuko da
        }else {
            $response['status'] = "false";
        }

        echo json_encode($response);
    }
    die();

        // if titulua {
        //     array_push("titulua="+titulua);
        // }

        // if (balorazioa) {
        //     array_push("balorazioa="+balorazioa);
        // }

        // if generoa {

        //     for ($j=0; $j < generoa[$j]; $j++) {

        //         if ($j = 0) {
        //             array_push("Generoa LIKE " . generoa[$j]);
        //         } else {
        //             array_push("OR Generoa LIKE " . generoa[$j]);
        //         }

        //     }
            
        // }

        // if urtea {
        //     array_push("urtea="+urtea);
        // }

        
        // for ($i=0; $i<$filtroak[$i]; $i++) {

        //     if ($i = 0){

        //         //ez du WHERE-a detektatzen??
        //         $filtroakQuery .= " WHERE " . $filtroak;

        //     } else {

        //         $filtroakQuery .= " AND " . $filtroak;

        //     }
        // } 

        // return $bilaketaQuery . $filtroakQuery;

?>


