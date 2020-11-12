<?php
    /* Erregistratzeko botoia klikatzean soilik saartuko da */
    if(isset($_POST['btn1'])) {
        echo('entra1');
        $erabIzena=$_POST['erabiltzailea'];
        /* Datu basearekiko konexioa egingo dugu konprobatzeko erabiltzaile izena erepikatzen ez dela. */
        try{
            /* Erabiltzaile izenak begiratu*/
            $miConsulta = $miPDO->prepare("SELECT ErabiltzaileIzena FROM erabiltzaile");
            $miConsulta->execute(); 
            $igual=false;
            while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
                //Koinziditzen duen a la ez begiratuko dugu
                if($erabIzena==$fila['ErabiltzaileIzena']){
                    //Koinziditzen badu...
                    $igual=true;
                    echo "<script>console.log('supuestamente el usuerio ya esta registrado pero ya ves tu')</script>";
                }
            }
            //Ez badu koinziditu... Libre dagoela esan nahi du, orduan insert egingo dugu
            if($igual==false){
                /* Variableak gordeko ditugu */
                $contra=$_POST['password1'];
                $erabIzena=$_POST['erabiltzailea'];
                $baim=1;
                $punt=0;
                /* Encriptatuko dugu pasahitza */
                $contra=md5($contra);
                /* Insert-a egingo dugu */
                $miConsulta = $miPDO->prepare("INSERT into erabiltzaile (ErabiltzaileIzena, Pasahitza,Bimenak,Puntuak) VALUES (?,?,?,?)");
                    /* iNTRODUCIMOS LOS VALORES A METER */    
                    $miConsulta->bindParam(1, $erabIzena);
                    $miConsulta->bindParam(2, $contra);
                    $miConsulta->bindParam(3, $baim);
                    $miConsulta->bindParam(4, $punt);
                /* Ejecutamos */
                $miConsulta->execute(); 
                /* Creamos las cookies para despues generar el localStorage */
                include 'PHP/crearCookies.php';
                /* Decimos que se han generado correctamente */
                echo'<script>alert("El usuario se ha creado correctamente")</script>';
                echo '<script>crearLocal();</script>';
                /* local-storage-a sortzeko */
            }

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        }
    }


