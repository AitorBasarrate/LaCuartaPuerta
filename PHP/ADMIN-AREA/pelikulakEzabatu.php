<!-- Pelikulak ezabatuko dituen PHP-a -->

<?php 
if(isset($_POST['delete'])){

        try{ 
            include 'PHP/dbKonexioa.php';
            $idPelikula = $_POST['idPelikula'];
            $miConsulta = $miPDO->prepare("SELECT FROM iruzkinak WHERE filmak_idPelikulak='$idPelikula'");
            if ($miConsulta->execute()) {
                $fila = $miConsulta->rowCount();
                if($fila!=0){
                 $miConsulta = $miPDO->prepare("DELETE FROM iruzkinak WHERE filmak_idPelikulak='$idPelikula'");
                 $miConsulta->execute();
                }
            }

            $miConsulta = $miPDO->prepare("SELECT FROM galderak WHERE idPelikulak='$idPelikula'");
            if ($miConsulta->execute()) {
                $fila = $miConsulta->rowCount();
                if($fila!=0){
                    $miConsulta = $miPDO->prepare("DELETE FROM galderak WHERE idPelikulak='$idPelikula'");
                    $miConsulta->execute();
                }
            }
           

            /* Erabiltzaileen ID izena eta puntuak aterako dugu */
            $miConsulta = $miPDO->prepare("DELETE FROM filmak WHERE idPelikulak='$idPelikula'");
            $miConsulta->execute();
            if ($miConsulta->execute()) {
                    echo '<script language="javascript">';
                    echo 'alert("Pelikula ezabatu da!")';
                    echo '</script>';
                } else {
                   echo('mierda');
                }

        }catch( PDOException $Exception ) {

                // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
                // String.
                throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );

        } 
    }

?>