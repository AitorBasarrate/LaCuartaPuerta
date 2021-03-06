<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Hemen datu basearekiko konexioa egingo da eta behar dituen php-ei detiuko dio -->
            <?php
                include 'PHP/dbKonexioa.php';
                include 'PHP/ERREGISTRO-LOGIN/erregistroaEgin.php';
                include 'PHP/ERREGISTRO-LOGIN/loginEgin.php';

                // Bilaketa bat egin bada dagoeneko, aurreko bilaketaren parametroak gordeko dituzten
                //cookiak
                if((isset($_POST['pelikulaIzenezBilatu']))) {
                    $pelikulaIzena=$_POST['pelikulaIzenezBilatu'];
                }

                if((isset($_POST['star']))) {
                    $izarrak=$_POST['star'];
                } else {
                    $izarrak = 0;
                }
            ?>
        <!-- Hasiera oriko estilua -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <script src="JS/loginKonprobatu.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="JS/HamburguerJS.js"></script>
        <script src="JS/bilaketa.js"></script>
        <script src="JS/sesionStorage.js"></script>
        <!-- Font family estiloa -->
        <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <!-- CSS stilo orrialdea -->
        <link rel="stylesheet" href="CSS/IndexCSS.css">
        <link rel="stylesheet" href="CSS/+FilmaCSS.css">
        <link rel="stylesheet" href="CSS/LogInArea.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- AJAX -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- izarrak-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
        <!-- Orriaren iconoa eta tituloa -->
        <link rel="icon" type="image/png" href="Media/fav-icon1.png">
        <title>La Cuarta Puerta</title>
        <!-- Loginaren css a -->
        <link rel="stylesheet" href="CSS/LogInArea.css">
        <script src="JS/erregistratu.js"></script>
    </head>
    <body>
        <div class="content">
            <header>
                    <!-- Hemen logoa txertatu behar da -->
                <a href="index.php"><img class="logo" id="logo"src="Media/logo-bien.png" alt="Au revoir Shoshanna"></a>                    <!-- Nabigatzailea, bakoitzak beraren orria kargatuko du -->
                <div class="topnav" id="myTopnav">
                    <a href="index.php">HASIERA</a>
                    <a href="astekoFilma.php">ASTEKO FILMA</a>
                    <a href="+Filma.php" class="active">+ FILMA</a>
                    <a href="bazkideArea.php" id="bazkideArea1">BAZKIDE AREA</a>
                    <a id="bazkideArea2" onclick="alert('Atal hau ikusi nahi baduzu, erregistratu')">BAZKIDE AREA</a>
                    <a href="adminArea.html" id="adminArea">ADMIN AREA</a>
                    <a class="LoginBoton" href="#home" id='LoginBoton'onclick="document.getElementById('izenaEman').style.display='block'"><i class="fa fa-fw fa-user" ></i> LOGIN</a>
                    <a class="LoginBoton"  href="#home" id='LogoutBoton' onclick="disableButton()"><i class="fa fa-fw fa-user" ></i> LOGOUT</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <!-- ESTO ES LA HAMBURGUESA -->
                    <i class="fa fa-bars"></i>
                    </a>
                </div>
                    <!-- Nabigatzaile barra, responsive egitean Haamburguesa ateratzen da -->
                <script src="JS/HamburguerJS.js"></script>
            </header>
            <div class="sidebar">
            <!-- FILTROEN ATALA -->
                <!-- BilatuBox-a -->
            <form method="POST" action="">
                <div id="bilatuBox">
                    <h2>Bilaketa filtroak</h2>
                    <hr class="guion-separador">
                    <h3>Filmen Izenburua:</h3>
                    <input type="text" id="pelikulaIzenezBilatu" name="pelikulaIzenezBilatu" placeholder="Pelikula bilatu..." title="pelikulaIzenezBilatu" maxlength="50" size="35" value = "<?php echo (isset($pelikulaIzena))?$pelikulaIzena:'';?>"> 
                </div>
                <hr class="guion-separador">
                <!-- Balorazioa -->                
                <div class="stars">
                    <h3>Balorazioa:</h3>
                    <!-- <form action=""> -->
                        <input class="star star-5" id="star-5" type="radio" name="star" value="5" <?php echo ($izarrak== 5) ?  "checked" : "" ;  ?>/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star" value="4" <?php echo ($izarrak== 4) ?  "checked" : "" ;  ?>/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star" value="3" <?php echo ($izarrak== 3) ?  "checked" : "" ;  ?>/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star" value="2" <?php echo ($izarrak== 2) ?  "checked" : "" ;  ?>/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star"value="1" <?php echo ($izarrak== 1) ?  "checked" : "" ;  ?>/>
                        <label class="star star-1" for="star-1"></label>
                    <!-- </form> -->
                </div>  
                <hr class="guion-separador">
                <!-- Generoa -->
                <div id="genero-lista">
                    <h3>Generoak:</h3>
                    <!--Generoak beteko dituen PHP-ari deia egin-->
                    <?php include ('PHP/+FILMAK/generoakBete.php');?> 
                </div>   
                <hr class="guion-separador">
                <!-- Urteak -->
                <div id="anyos">
                    <h3>Urtea:</h3>
                    <select id="urtea" name="urtea" > 
                        <!--Urteak beteko dituen PHP-ari deia egin-->
                        <?php include ('PHP/+FILMAK/urteakBete.php');?>
                    </select>
                    </div><br>
                    <input type="submit" style='width:250px; height:25px font-weight:bolt' name="buscar" value='BILATU'>
                </div>
            </form>
            <!-- Pelikulen lista -->
                <div id="pelikula-lista" class="flex-container">
                    <?php include  'PHP/+FILMAK/pelikulakPlusBilaketa2.php'; ?>
                    <script type="text/javascript">var izenburua = "<?= $izenburua ?>";</script>
                    <!-- <script type="text/javascript" src="js/filmaIzenak.js"></script> -->
                </div>
        </div>
        <!-- Izena emateko MODAL-a -->
        <div class="modal" id="izenaEman"> 
            <!-- Ixteko botoia -->
            <span style="cursor: pointer;" onclick="document.getElementById('izenaEman').style.display='none'" class="close-button" title="Close Modal">&times;</span>
            <!-- Bazkide egiteko atalaren kontenidoa -->
            <div class="modal-container"><!--------------------------------------------------------------------------------->
                <!-- Kolumna 1 bazkidearen informazioa -->
                <div class="column1">
                    <h3>Bazkide izatearen abantailak</h3>
                    <p>
                        "La cuarta Pared" familian parte hartzen baduzu abantaila pilarekin topatuko zara! Haien artean: 
                        <ul>
                            <li type="square">Hurrengo asteko pelikula zein izango den aurrerapena izango duzu.</li>
                            <li type="square">Pelikuletan komentatu ahalko duzu.</li>
                            <li type="square">Pelikulen kuriositate izkutuak erakutsiko dizkizugu.</li>
                            <li type="square">Beste bazkide batzuekin "Asteko galderan" parte hartu ahalko duzu eta gure ranking-ean sartu!</li>
                        </ul>    
                    </p>
                </div>
                <!-- Kolumna 2 datak sartzeko atala -->
                            
                <form  method='post' action=''>
                    <div class="column2">
                            <!-- Izen emateko datuak sartu -->
                            <!-- Izena -->
                            <div class='erabIzena'>
                                <input type="text" name="erabiltzailea" id="erabiltzailea" oninput='erabiltzaileKonp(),denaOndo()' placeholder="Erabiltzaile izena *" required>
                                <!-- Baldintzak erabiltzaile izenarekiko (hover batean) -->
                                <div class="hoverErab">
                                    <img class="info" src='media/informacion.png'><br>
                                    <span class="condicionesErab">
                                        <a>Gutxieneko kondizioak:</a>
                                        <ul>
                                            <li><a><img src='Media/candadoCondiciones.png' width='15px'>5 Karaktere</a></li>
                                            <li><a><img src='Media/candadoCondiciones.png' width='15px'>Soilik zenbakiak eta letrak</a></li>
                                        </ul></span>
                                    
                                </div>
                            </div>
                            <!-- Pasahitza -->
                            <div class='pswd1'>
                                <input type="password" id="password1" name="password1" oninput='pasahitzaKonp(),denaOndo()' placeholder="Pasahitza *" required>
                                <!-- Baldintzak pasahitzari dagokiones (hover batean) -->
                                <div class="hoverContra">
                                    <img class="info" src='media/informacion.png'><br>
                                    <span class="condicionesContra">
                                        <a>Gutxieneko kondizioak:</a>
                                        <ul>
                                            <li><a><img src='Media/candadoCondiciones.png' width='15px'>8 Karaktere</a></li>
                                            <li><a><img src='Media/candadoCondiciones.png' width='15px'>Zenbaki bat</a></li>
                                            <li><a><img src='Media/candadoCondiciones.png' width='15px'>Letra larri bat</a></li>
                                        </ul></span>
                                    
                                </div>
                            </div>
                            
                        <!-- Pasahitza konfirmatu -->
                        <input type="password" name="password2" id='password2' placeholder="Pasahitza konfirmatu"  oninput='pasahitzakBerdin(),denaOndo()' required><br>
                        <!-- Korreoa -->
                        <input type="email" id='korreoa' name="korreoa" placeholder="Posta elektronikoa jarri" oninput='korreoaOndo(),denaOndo()' required ><br>
                        <!-- Termino legalak onartu-->
                        <input type="checkbox" id="terminoLegalak" name="terminoLegalak" value="Boat" onclick='denaOndo()'>
                        <label for="terminoLegalak">Termino legalak onartzen ditut.</label><br>
                        <!-- Izena eman -->
                        <input type="submit" id='register' name="btn1" value="register" onclick="crearLocal()" disabled>
                        <!-- Bazkide naiz botoia - Sartzeko modal-a erakutsi -->
                        <button onclick="bazkideaSartu(this.id)" id="bazkideNaiz">Bazkidea naiz dagoeneko</button>
                    </div> 
                </form>
            </div>
        </div> 
       
        <!-- Sartu MODAL-a -->
        <div class="modal" id="sartu" hidden>
            <!-- Ixteko botoia -->
                <span style="cursor: pointer;" onclick="document.getElementById('sartu').style.display='none'" class="close-button" title="Close Modal">&times;</span>
            <div class="modal-container2">
                <!-- Kolumna 1 -->
                <div class="column3">
                    <!-- Hemen logoa txertatu behar da -->
                    <img class="logo" src="Media/logo-bien-negro.png" alt="Au revoir Shoshanna" />
                </div>
                <!-- Kolumna 2 -->
                <form target="frame2" method='post'>
                    <div class="column4">  
                        <!-- Izen emateko datuak sartu -->
                        <a>Saioa asi:</a><br>
                        <!-- Izena -->
                        <input type="text" name="erabiltzailea" placeholder="Erabiltzaile izena *" required><br>
                        <!-- Pasahitza -->
                        <input type="password" name="password1" placeholder="Pasahitza *" required><br>
                        <!-- Sartu -->
                        <input type="submit" value="logIn" name="btn2"><br>
                        <button onclick="bazkideaSartu(this.id)" id="erregistratuNahi">Ez naiz bazkide, izena eman</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
            <footer>
                <div class="footerP1">
                    <img  src="Media/Footer/instagra.png">
                    <a>@LaCuartaPuerta</a>      
                    <img  src="Media/Footer/twitter-logo-6.png">
                    <a>@LaCuartaPuerta</a>        
                    <img src="Media/Footer/gmail.png">
                    <a>LaCuartaPuerta@gmail.com</a>
                </div>
                <div class="footerP2">
                    <a>@Talde5</a>
                </div>
            </footer>
        </body>
    </html>