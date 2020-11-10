<?php
    function erregistroaEgin(){
    /* Erregistratzeko botoia klikatzean soilik saartuko da */
    if(isset($_POST['btn1'])) {
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
                /* Encriptatuko dugu pasahitza */
                $contra=md5($contra);
                
                /* Insert-a egingo dugu */
                $miConsulta = $miPDO->prepare("INSERT into erabiltzaile (ErabiltzaileIzena, Pasahitza) VALUES (?,?)");
                    /* iNTRODUCIMOS LOS VALORES A METER */    
                    $miConsulta->bindParam(1, $erabIzena);
                    $miConsulta->bindParam(2, $contra);
                /* Ejecutamos */
                $miConsulta->execute(); 
                return true;
            }else{
                return false;
            }

        }catch( PDOException $Exception ) {
            // PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
            // String.
            throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
        }
    }
    // Lo de Aitor para mostrar el modal de registro
    if(isset($_POST['btn2'])) { 
        /* Variableak gordeko ditugu */
        $contra=$_POST['password1'];
        $erabIzena=$_POST['erabiltzailea'];
        /* Encriptatuko dugu pasahitza */
        $contra=md5($contra);
        /* Erabiltzaile izenak begiratu*/
        $miConsulta = $miPDO->prepare("SELECT ErabiltzaileIzena,Pasahitza FROM erabiltzaile Where EabiltzaileIzena='.$erabIzena.'");
        $miConsulta->execute(); 
        $igual=false;
        while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
            //Koinziditzen duen a la ez begiratuko dugu
            if($erabIzena==$fila['ErabiltzaileIzena'] && $contra==$fila['Pasahitza']){
                //Koinziditzen badu...
                $igual=true;
            }
        }
        /* Koinziditu badu */
        if($igual==true){
            echo('bienvenido usuario');
        }else{
            echo('no hay ningun usuario');
        }

    }
}

?>