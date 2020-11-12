<!-- Erabiltzaileak ezabatuko dituen PHP-a -->

<?php 

        try{ 

            $idErab = $_GET['id'];
            include 'PHP/dbKonexioa.php';
            /* Erabiltzaileen ID izena eta puntuak aterako dugu */
            $miConsulta = $miPDO->prepare("DELETE FROM erabiltzaile WHERE idErabiltzaile=:idErabiltzaile");
            $miConsulta->bindValue("idErabiltzaile",intval($idErab));

                if ($miConsulta->execute()) {

                    echo 'alert("Erabiltzailea ezabatu da!")';

                } else {

                    echo "Ezin izan da erabiltzailea ezabatu: " . $miConsulta->error;

                }

        }catch( PDOException $Exception ) {

                // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
                // String.
                throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );

        } 

?>