<!-- Web atal honetan behar dugun informazioa aterako dugu -->

<?php try{
    /* Hurrengo pelikularen argazkia eta izena  */
        $izenburua;
        $miConsulta = $miPDO->prepare("SELECT Izenburuak,Argazkia FROM filmak ORDER BY Izenburuak DESC LIMIT 1");
        $miConsulta->execute();
        /* array asociativo */
        
        while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
            echo $fila['Izenburuak'];
            echo $fila['Argazkia'];
        }
        
    }catch( PDOException $Exception ) {
        // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
        // String.
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    } 
?>