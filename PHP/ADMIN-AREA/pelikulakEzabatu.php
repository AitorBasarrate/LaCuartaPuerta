<!-- Pelikulak ezabatuko dituen PHP-a -->

<?php 
if(isset($_POST['delete'])){

        try{ 

            $idPelikula = $_POST['idPelikula'];
            include 'PHP/dbKonexioa.php';
            /* Erabiltzaileen ID izena eta puntuak aterako dugu */
            $miConsulta = $miPDO->prepare("DELETE FROM filmak WHERE idPelikulak=:idPelikulak");
            $miConsulta->bindValue("idPelikulak",intval($idPelikula));

                if ($miConsulta->execute()) {
                    
                    echo '<script language="javascript">';
                    echo 'alert("Pelikula ezabatu da!")';
                    echo '</script>';

                } else {

                    echo "Ezin izan da pelikula ezabatu: " . $miConsulta->error;

                }

        }catch( PDOException $Exception ) {

                // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
                // String.
                throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );

        } 
    }

?>