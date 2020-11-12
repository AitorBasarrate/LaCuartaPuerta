<?php 

function hacerSelect($par){
    try{ 
        include 'PHP/dbKonexioa.php';
        /* Pelikulen argazkia eta izena aterako dugu */
        $miConsulta = $miPDO->prepare($par);
        $miConsulta->execute(); 
        if (!is_null($miConsulta)) {
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
        }else {
            echo"<script> alert('No existe ninguna pelicula que cumpla esos valores')</script>";
        }
            
        
    }catch( PDOException $Exception ) {
        // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
        // String.
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    } 
}

/* ARRAY HAU SORTUKO DUGU SELECT-REN KATEAK GORDETZEKO*/
$filtroak =array(); 
// Filtroren bat beteta badago SQL- kontsultari WHERE klausula gehituko da
if((isset($_POST['pelikulaIzenezBilatu'])) || (isset($_POST['star'])) || (isset($_POST['generoa'])) || (isset($_POST['urtea']))) {
    $sql = "SELECT * FROM filmak WHERE";
    array_push($filtroak,$sql);
    // Filtroen array-a bete beharrezko AND-ak jartzeko
    if((isset($_POST['pelikulaIzenezBilatu']))) {
        $pelikulaIzena=$_POST['pelikulaIzenezBilatu'];
        if($pelikulaIzena!=''){
            $pelikulaIzena = " Izenburuak LIKE '%{$pelikulaIzena}%' ";
        array_push($filtroak,$pelikulaIzena);
        }
    
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
                $str= " Generoa = '{$generoa[0]}' ";
                for($i=1; $i <count($generoa); $i++){
                    $var=" or Generoa = '{$generoa[$i]}'";
                    $str=$str.$var;
                } 
                array_push($filtroak,$str);
            }
        else{
            $var= " Generoa = '{$generoa[0]}' ";
            array_push($filtroak,$var);
        } 
    }  

     
    if(isset($_POST['urtea'])) {
        
        $año=$_POST['urtea'];
        if($año!=''){
            $var1 = " Urtea = {$año} ";
                array_push($filtroak,$var1);
        }
       
       
    }
    //filtroak irakurtzeko
    
    if(isset($filtroak)){
                $sql= $filtroak[0];
                $sql.= $filtroak[1];
         for ($i=2; $i<count($filtroak); $i++) {
            
                $sql.= " AND " . $filtroak[$i];
                
            }
      
      
    }
   
    
}
if((!isset($_POST['pelikulaIzenezBilatu'])) && (!isset($_POST['star'])) &&(!isset($_POST['generoa'])) &&(!isset($_POST['urtea']))) {
    $sql = "SELECT * FROM filmak ";

    }
   
hacerSelect($sql);
/* print_r($sql);  */  
?>
