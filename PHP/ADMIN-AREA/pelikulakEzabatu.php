<!-- Pelikulak ezabatuko dituen PHP-a -->

<?php 
if(isset($_POST['delete'])){

        try{ 
            include 'PHP/dbKonexioa.php';
            $idPelikula = $_POST['idPelikula'];
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