<?php
//bARIABLE HAU DATU BASETIK ATERAKO ZEN
try{    
    $hitzOna='NASA';
    $hitzOna=strtolower($hitzOna);
    if(isset($_POST["erantzunaBidali"])){
        $erabiltzaileIzena=$_COOKIE['usuario'];
        $hitza=$_POST['igarkizunErantzuna'];
        $hitza=strtolower($hitza);
        if($hitza==$hitzOna){
            $miConsulta = $miPDO->prepare("UPDATE ERABILTZAILE set puntuak=puntuak+100 where erabiltzaileizena='$erabiltzaileIzena'");
            $miConsulta->execute(); 
            echo '<script>alert("Correcto! '.$erabiltzaileIzena.' se te sumaran: + 100 puntos")</script>';
        }
    }
}catch( PDOException $Exception ) {
    // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
    // String.
    throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
} 
?>
