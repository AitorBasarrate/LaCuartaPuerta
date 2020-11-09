<?php 
/* ARRAY HAU SORTUKO DUGU SELECT-REN KATEAK GORDETZEKO*/
$filtroak =array(); 
// Filtroren bat beteta badago SQL- kontsultari WHERE klausula gehituko da
if((isset($_POST['pelikulaIzenezBilatu'])) || (isset($_POST['star'])) || (isset($_POST['generoa'])) || (isset($_POST['urtea']))) {
    $sql = "SELECT * FROM filmak WHERE";
    array_push($filtroak,$sql);
    // Filtroen array-a bete beharrezko AND-ak jartzeko
    if((isset($_POST['pelikulaIzenezBilatu']))) {
        $pelikulaIzena=$_POST['pelikulaIzenezBilatu'];
        $pelikulaIzena = " Izenburuak LIKE {$pelikulaIzena} ";
        array_push($filtroak,$pelikulaIzena);
    }
    if((isset($_POST['star']))) {
        $izarrak=$_POST['star'];
        $balorazioa = " Balorazioa >= {$izarrak}";
        array_push($filtroak,$balorazioa);
    }
    if((isset($_POST['generoa']))){
        $generoa=$_POST['generoa'];
        $cantidadGeneros=count($generoa);

        if($cantidadGeneros>1){
                $str= " Generoa = {$generoa[0]} ";
                for($i=1; $i <count($generoa); $i++){
                    $var=" and Generoa = {$generoa[$i]}";
                    $str=$str.$var;
                } 
                array_push($filtroak,$str);
            }
            else{
                $var= " Generoa = {$generoa[0]} ";
                array_push($filtroak,$var);
            } 
        
            //$filtroak = array_push($urtea);
        }  

    if((isset($_POST['urtea']))) {
        $año=$_POST['urtea'];
        $var = " Urtea = {$año} ";
        $filtroak =array_push($filtroak,$var);
        
        echo($filtroak[0]); 
    }
    //filtroak irakurtzeko
    if(isset($filtroak)){
        /*  for ($i=0; $i<count($filtroak); $i++) {
            while($i<2){
                $sql= $filtroak[0];
                $sql.= $filtroak[1];
            }

                $sql.= " AND " . $filtroak[$i];
                
            echo($sql);  } */
   
    }else{
    $sql = "SELECT * FROM filmak ";
    }
   
    
        
}

?>