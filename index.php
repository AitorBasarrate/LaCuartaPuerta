<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Hemen datu basearekiko konexioa -->
        <?php
            include 'PHP/dbKonexioa.php';
            include 'PHP/ERREGISTRO-LOGIN/erregistroaEgin.php';
            include 'PHP/ERREGISTRO-LOGIN/loginEgin.php';
        ?>

        <!-- Erregistro atala -->
        <script src="JS/sesionStorage.js"></script>
        <script src="JS/erregistratu.js"></script>
        <!-- Hasiera oriko estilua -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="JS/HamburguerJS.js"></script>
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- Font family estiloa -->
        <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <!-- CSS stilo orrialdea -->
        <link rel="stylesheet" href="CSS/IndexCSS.css">        
        <link rel="stylesheet" href="CSS/LogInArea.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- Orriaren iconoa eta tituloa -->
        <link rel="icon" type="image/png" href="Media/fav-icon1.png">
        <script src="JS/index.js"></script>
        
        <title>La Cuarta Puerta</title>
        
    </head>
    <body>
        <div class="content">
            <header>
                    <!-- Hemen logoa txertatu behar da -->
                <img class="logo" id="logo"src="Media/logo-bien.png" alt="Au revoir Shoshanna">
                    <!-- Nabigatzailea, bakoitzak beraren orria kargatuko du -->
                <div class="topnav" id="myTopnav">
                    <a href="index.php" class="active">HASIERA</a>
                    <a href="astekoFilma.php">ASTEKO FILMA</a>
                    <a href="+Filma.php">+ FILMA</a>
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
                <div class="contenido">
                    <div class="wrapper">
                        <?php include ('PHP/INDEX/indexDatosPelis.php');?> 
                    </div>
                    <div class="trailer">
                        
                    <div class="trailerBox" id="trailerBox "onmouseover="botoiHandiak(this.id)" onmouseout="botoiTxikiak(this.id)"><?php include ('PHP/INDEX/indexTrailer.php');?></div> 
                        <!-- <div class="trailerBox" id="trailerBox "onmouseover="botoiHandiak(this.id)" onmouseout="botoiTxikiak(this.id)">
                        <iframe allow='autoplay' src=<?php include ('PHP/INDEX/indexTrailer.php') ?>> -->
                        </iframe>
                        </div>

                    </div>
                    <div class="sobreNosotros">
                        <h1>GURI BURUZ</h1><br>
                        <p>     Zinemazaleentzat diseinatutako bloga da, baita zinemaren ikuspegia aldatzeko gogoa dutenentzat da. Astero, film bat aukeratuko dugu honi buruz hitz egiteko eta aztertzeko
                            iruzkinen atalen bitartez. Film gehiagotarako, ikus +Filmak atala. ADI! Ez ahaztu bazkide egin zaitezkela eta horrek hanbat abantailak dituela.</p>
                    </div>
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
                <form method='post' action=''>
                    <div class="column4">  
                        <!-- Izen emateko datuak sartu -->
                        <a>Saioa asi:</a><br>
                        <!-- Izena -->
                        <input type="text" name="erabiltzailea" placeholder="Erabiltzaile izena *" oninput='erabiltzaileKonp(),denaOndo()' required><br>
                        <!-- Pasahitza -->
                        <input type="password" name="password1" placeholder="Pasahitza *" oninput='pasahitzakBerdin(),denaOndo()' required><br>
                        <!-- Sartu -->
                        <input type="submit" value="logIn" onclick="bazkideaSartu()" id='btn2' name="btn2"><br>
                        <button onclick="bazkideaSartu(this.id)" id="erregistratuNavhi">Ez naiz bazkide, izena eman</button>
                    </div>
                </form>
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