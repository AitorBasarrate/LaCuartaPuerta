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
                echo("<script>
                    console.log('entra4');
                    console.log(localStorage.getItem('nombre'));
                    localStorage.clear();
                    //Aurretikan baldin ez badago
                    console.log('entra5');
                    //Sortutako cookiak (crearCookies.php-tik) irakurtzen ditugu
                    //Uruario cooki-a
                    var nameEQ = 'usuario' + '=';
                    var ca = document.cookie.split(';');
                    for(var i=0;i < ca.length;i++) { 
                        var c = ca[i]; while (c.charAt(0)==' ') c = c.substring(1,c.length); 
                        if (c.indexOf(nameEQ) == 0) {
                            var cookie1=c.substring(nameEQ.length,c.length);
                        } 
                    }
                    //contraseña cooki-a
                    var nameEQ = 'contraseña' + '=';
                    var ca = document.cookie.split(';');
                    for(var i=0;i < ca.length;i++) { 
                        var c = ca[i]; while (c.charAt(0)==' ') c = c.substring(1,c.length); 
                        if (c.indexOf(nameEQ) == 0) {
                        var cookie2=c.substring(nameEQ.length,c.length);
                        } 
                    }
                    //permisos cooki-a
                    var nameEQ = 'permisos' + '=';
                    var ca = document.cookie.split(';');
                    for(var i=0;i < ca.length;i++) { 
                        var c = ca[i]; while (c.charAt(0)==' ') c = c.substring(1,c.length); 
                        if (c.indexOf(nameEQ) == 0) {
                        var cookie3=c.substring(nameEQ.length,c.length);
                        } 
                    }
                    //loc
                    //localStorage sortzen dugu datu horietatik
                    var nombre=cookie1;
                    var apellido=cookie2;
                    var permisos=cookie3;
                
                    localStorage.setItem('usuario', nombre);
                    localStorage.setItem('contraseña', apellido);
                    localStorage.setItem('permisos', permisos);
                    //menua aldatzen dugu
                    document.getElementById('LoginBoton').style.display='none';
                    document.getElementById('LogoutBoton').style.display='block';
                    </script>");
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


