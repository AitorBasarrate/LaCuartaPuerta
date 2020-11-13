
<?php

    include_once ("dbKonexioa.php");
    if(isset($_POST['btn2'])) { 
        /* Variableak gordeko ditugu */
        $contra=$_POST['password1'];
        $erabIzena=$_POST['erabiltzailea'];
        /* Encriptatuko dugu pasahitza */
        $contra=md5($contra);
        echo('pdfg2');
        try{
        /* Erabiltzaile izenak begiratu*/
        $miConsulta = $miPDO->prepare("SELECT ErabiltzaileIzena,Pasahitza ,Baimenak FROM erabiltzaile Where ErabiltzaileIzena='$erabIzena'");
        $miConsulta->execute(); 
        echo('pdfg3');
        $igual=false;
        while ($fila = $miConsulta->fetch(PDO::FETCH_ASSOC)){
            echo('pdfg4');
            //Koinziditzen duen a la ez begiratuko dugu
            if($erabIzena==$fila['ErabiltzaileIzena'] && $contra==$fila['Pasahitza']){
                $erabIzena=$fila['ErabiltzaileIzena'];
                $baim=$fila['Baimenak'];
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