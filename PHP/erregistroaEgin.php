<?php
include 'dbKonexioa.php';
    /* Kontsulta egingo dugu ea erabiltzailea koinziditzen duen beste erregistro batekin */
        try{
            /* Genero desberdinen lista atera */
            $arrayErab=array();
            $miConsulta = $miPDO->prepare("SELECT ErabiltzaileIzena FROM erabiltzaile");
            $miConsulta->execute(); 
        
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //Izenburua 
                $erab=$fila['ErabiltzaileIzena'];
                array_push($arrayErab,$erab);
            }
            echo('pito');

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        }

        if(isset($_POST['btn1'])) { 
            echo "This is Button1 that is selected"; 
        }
        // Lo de Aitor para mostrar el modal de registro
        if(isset($_POST['btn1'])) { 


        
        }
?>