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
                echo'<script>alert("El usuario se ha creado correctamente")</script>';
            }

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        }
    }
    // Lo de Aitor para mostrar el modal de registro
    if(isset($_POST['btn2'])) { 
        echo('pdfg');
        /* Variableak gordeko ditugu */
        $contra=$_POST['password1'];
        $erabIzena=$_POST['erabiltzailea'];
        /* Encriptatuko dugu pasahitza */
        $contra=md5($contra);
        echo('pdfg2');
        try{
        /* Erabiltzaile izenak begiratu*/
        $miConsulta = $miPDO->prepare("SELECT ErabiltzaileIzena,Pasahitza FROM erabiltzaile Where ErabiltzaileIzena='$erabIzena'");
        $miConsulta->execute(); 
        echo('pdfg3');
        $igual=false;
        while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
            echo('pdfg4');
            //Koinziditzen duen a la ez begiratuko dugu
            if($erabIzena==$fila['ErabiltzaileIzena'] && $contra==$fila['Pasahitza']){
                //Koinziditzen badu...
               
                $igual=true;
            }
        }
    }catch( PDOException $Exception ) {
        // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
        // String.
        throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
    }
        /* Koinziditu badu */
        if($igual==true){
            echo 'coincide';
            echo'<style>
            #sartu{
                display:none;
            }
            #izenaEman{
                display:none;
            }
            </style>';
          
        }else{
            echo '<script>alert("Los datos son incorrectos.")</script>';
            echo'<style>
            #sartu{
                display:block;
            }
            #izenaEman{
                display:none;
            }
            </style>';
        }

    }
?>
