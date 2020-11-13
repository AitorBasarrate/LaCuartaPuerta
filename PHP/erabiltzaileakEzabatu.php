<!-- Erabiltzaileak ezabatuko dituen PHP-a -->

<?php 
if(isset($_POST['delete'])){

        try{ 

            $idErab = $_POST['idErab'];
            include 'dbKonexioa.php';
            $miConsulta = $miPDO->prepare("DELETE FROM erabiltzaile WHERE idErabiltzaile=:idErabiltzaile");
            $miConsulta->bindValue("idErabiltzaile",intval($idErab));

                if ($miConsulta->execute()) {
                    
                    echo '<script language="javascript">';
                    echo 'alert("Erabiltzailea ezabatu da!")';
                    echo '</script>';

                } else {

                    echo "Ezin izan da erabiltzailea ezabatu: " . $miConsulta->error;

                }

        }catch( PDOException $Exception ) {

                // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
                // String.
                throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );

        } 
    }

?>