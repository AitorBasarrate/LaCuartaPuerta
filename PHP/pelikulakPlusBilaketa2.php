<?php 
/* Datu baseko selekt simplea egingo dugu hasieran agertuko dena filtrorik gabe*/
$sql = "SELECT * FROM filmak";
$filtroak =array();

// Filtroren bat beteta badago SQL- kontsultari WHERE klausula gehituko da
if((isset($_POST['pelikulaIzenezBilatu'])) || (isset($_POST['star'])) || (isset($_POST['generoa'])) || (isset($_POST['urtea']))) {
     $sql .= " WHERE ";

    // Filtroen array-a bete beharrezko AND-ak jartzeko
    if((isset($_POST['pelikulaIzenezBilatu']))) {
        $pelikulaIzena=$_POST['pelikulaIzenezBilatu'];
        echo($pelikulaIzena);
        $pelikulaIzena = " Izenburuak LIKE {$pelikulaIzena} ";
        array_push($filtroak,$pelikulaIzena);
    }
    if((isset($_POST['star']))) {
        $izarrak=$_POST['star'];
        $izarrak=($izarrak*20);
        echo($izarrak);
        $balorazioa = " Balorazioa >= {$izarrak}";
        array_push($filtroak,$balorazioa);
    }
    if((isset($_POST['generoa']))){
        $generoa=$_POST['generoa'];
        $cantidadGeneros=count($generoa);

    if($cantidadGeneros>1){
            $str = " Generoa = {$generoa[0]} ";
            for($i=1; $i <count($generoa); $i++){
                $var =" and Generoa = {$generoa[$i]}";
                $str.=$var;
            } 
            echo($str);
            array_push($filtroak,$str);
        }
        else{
            $var = " Generoa = {$generoa[0]} ";
            array_push($filtroak,$var);
        } 
    
        //$filtroak = array_push($urtea);
    }  

    if((isset($_POST['urtea']))) {
        $año=$_POST['urtea'];
        echo($año);
        $str = " Urtea = {$año} ";
        $filtroak = array_push($filtroak,$str); 
    }
    
    //filtroak irakurtzeko
    for ($i=1; $i<$filtroak[$i]; $i++) {
        if ($i>1){
            $sql= "SELECT * FROM filmak";//ez du WHERE-a detektatzen??
            $sql.= $filtroak[0];
            $sql.= " AND " . $filtroak[$i];
            
        } else {
            $sql= "SELECT * FROM filmak"; 
        }
    }
    echo($sql); 
        
}

?>