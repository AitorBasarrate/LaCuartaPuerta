<?php
    //Datu baseari konexioa deituko diogu 
    require_once("dbKonexioa.php");

    // $sql = "SELECT * FROM filmak WHERE Izenburuak LIKE :titulo";
    $sql = "SELECT * FROM filmak";
    $filtroak = array();

    // Filtroren bat beteta badago SQL- kontsultari WHERE klausula gehituko da
    if(($_POST && !empty($_POST['value'])) || ($_POST && !empty($_POST['balorazioa'])) || ($_POST && !empty($_POST['urtea'])) || ($_POST && !empty($_POST['generoa']))) {
        $sql .= " WHERE ";
    }

    // Filtroen array-a bete beharrezko AND-ak jartzeko
    if(($_POST && !empty($_POST['value']))) {
        $titulua = " Izenburuak LIKE {$_POST['value']} ";
        $filtroak = array_push($titulua);
    }
    if(($_POST && !empty($_POST['balorazioa']))) {
        $balorazioa = " Balorazioa = {$_POST['value']} ";
        $filtroak = array_push($balorazioa);
    }
    if(($_POST && !empty($_POST['urtea']))) {
        $urtea = " Urtea = {$_POST['value']} ";
        $filtroak = array_push($urtea);
    }
    if(($_POST && !empty($_POST['generoa']))) {
        $generoa = " Generoa LIKE {$_POST['value']} ";
        $filtroak = array_push($generoa);
    }


    for ($i=0; $i<$filtroak[$i]; $i++) {
        if ($i = 0){
            //ez du WHERE-a detektatzen??
            $sql .= " WHERE " . $filtroak[$i];
        } else {
            $sql .= " AND " . $filtroak[$i];
        }
    } 

    // bilaketa.js-tik jasotako bilaketa filtroak jaso 
    if ($_POST && !empty($_POST['value'])) {
        $response = array("status" => "" );

        // $sql .= " Izenburuak LIKE :titulo ";
        
        // Kontsulta egin jasotako parametroak WHERE-ean jarriz
        $miConsulta = $miPDO->prepare( $sql );

        // Exekutatzen bada eta zerbait itzultzen badu
        // Array baten sartuta dauden POST balioen bitartez goiko kontsultaren aldagaiak beteko ditugu
        if ($miConsulta->execute(["titulo" => "%".$_POST['value']."%", "generoa" => "%".$_POST['generoa']."%", "Urtea" => "%".$_POST['urtea']."%", "Balorazioa" => "%".$_POST['balorazioa']."%"]) {
            // $response['status'] = "OK";
            // $response['data'] = array();

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

        // if generoa {

        //     for ($j=0; $j < generoa[$j]; $j++) {

        //         if ($j = 0) {
        //             array_push("Generoa LIKE " . generoa[$j]);
        //         } else {
        //             array_push("OR Generoa LIKE " . generoa[$j]);
        //         }

        //     }
            
        // }


        



?>


