<!DOCTYPE html>
<html lang="en">
<head>    
    <?php
        include 'PHP/dbKonexioa.php';
        include 'PHP/erregistroaEgin.php';
        include 'PHP/loginEgin.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <script src="JS/bazkideArea.js"></script>
    <script src="JS/sesionStorage.js"></script>
    <script src="JS/erregistratu.js"></script>
    <script src="JS/replaceHistory.js"></script>
    <!-- Hasiera oriko estilua -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="JS/LoginJS.js"></script>
    <script src="JS/HamburguerJS.js"></script>
    <!-- Font family estiloa -->
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <!-- CSS stilo orrialdea -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Comentarios -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="CSS/filmaBerria.css">
    <link rel="stylesheet" href="CSS/LogInArea.css">
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Orriaren iconoa eta tituloa -->
    <link rel="icon" type="image/png" href="Media/fav-icon1.png">
    <title>La Cuarta Puerta</title>
</head>
<body>
    <div class="content">
        <header>
                <!-- Hemen logoa txertatu behar da -->
            <a href="index.php"><img class="logo" id="logo"src="Media/logo-bien.png" alt="Au revoir Shoshanna"></a>                <!-- Nabigatzailea, bakoitzak beraren orria kargatuko du -->
            <div class="topnav" id="myTopnav">
                <a href="index.php" class="active">HASIERA</a>
                <a href="astekoFilma.php">ASTEKO FILMA</a>
                <a href="+Filma.php">+ FILMA</a>
                <a href="bazkideArea.php" id="bazkideArea1">BAZKIDE AREA</a>
                <a id="bazkideArea2" onclick="alert('Atal hau ikusi nahi baduzu, erregistratu')">BAZKIDE AREA</a>
                <a href="adminArea.html" id="adminArea">ADMIN AREA</a>
                <a class="LoginBoton" href="#home" id='LoginBoton'onclick="document.getElementById('izenaEman').style.display='block'"><i class="fa fa-fw fa-user" ></i> LOGIN</a>
                <a class="LoginBoton"  href="index.php" id='LogoutBoton' onclick="disableButton()"><i class="fa fa-fw fa-user" ></i> LOGOUT</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <!-- ESTO ES LA HAMBURGUESA -->
                <i class="fa fa-bars"></i>
                </a>
            </div>
                <!-- Nabigatzaile barra, responsive egitean Haamburguesa ateratzen da -->
            <script src="JS/HamburguerJS.js"></script>
        </header>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="grid-container">
                <div class="grid-item item1">
                    <h3>Izenburua:</h3>
                    <input type="text" name="izenburua" id="izenburua" placeholder="Filmaren Izenburua" required></input>
                    <h3>Trailer:</h3>
                    <input type="text" name="trailer" placeholder="Filmaren Trailer-a" required></input><hr>
                </div>
                <div class="grid-item item2">
                    <h3>Urtea:</h3>
                    <input type="text" name="urtea" placeholder="Filmaren Urtea" required></input>
                    <h3>Balorazioa:</h3>
                    <input type="text" name="balorazioa" placeholder="Filmaren Balorazioa" required></input><hr>
                </div>
                    <div class="grid-item item3" >
                    <h3>Zuzendaria:</h3>
                    <input type="text" name="zuzendaria" placeholder="Filmaren Zuzendaria" required></input>
                    <h3>Generoa:</h3>
                    <input type="text" name="generoa" placeholder="Filmaren Generoa" required></input><hr>
                </div>
                <div class="grid-item item4">
                    <h3>Sinopsis:</h3>
                    <textarea name="sinopsis" id="sinopsis" maxlength="250" placeholder="Filmaren Sinopsis-a" required></textarea><hr>
                </div>
                <div class="grid-item item5">
                    <h3>Kritika:</h3>
                    <textarea name="kritika" name="kritika" id="kritika" maxlength="250" placeholder="Filmaren Kritika" required></textarea><hr>
                </div>
                <div class="grid-item item6">
                    <h3>Filmaren Datua:</h3>
                    <textarea name="datua" id="datua" maxlength="250" placeholder="Filmaren Datua" required></textarea><hr>
                </div>
                <div class="grid-item item7">
                    <h3>Filmaren Galdera:</h3>
                    <textarea name="galdera" id="galdera" maxlength="250" placeholder="Filmaren Galdera" required></textarea><hr>
                </div>
                <div class="grid-item item8">
                <h3>Galderaren Erantzuna:</h3>
                    <textarea name="erantzuna" id="erantzuna" maxlength="250" placeholder="Galderaren Erantzuna" required></textarea><hr>
                </div>
                <div class="grid-item item9">
                    <br><input type="file" id="img" name="argazkia" accept="image/*" required><br><br>
                    <input type="submit" name="gorde" onclick="<?php include 'PHP/filmaBerriaGorde.php'; ?>" value="Filma Gorde">
                    <input type="reset" value="Datuak Ezabatu">
                </div>
            </div>
        </form>
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
                            
                <form target="frame1" method='post'>
                    <div class="column2">
                            <!-- Izen emateko datuak sartu -->
                            <!-- Izena -->
                            <div class='erabIzena'>
                                <input type="text" name="erabiltzailea" id="erabiltzailea" oninput='erabiltzaileKonp()' oninput='denaOndo()' placeholder="Erabiltzaile izena *" required>
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
                                <input type="password" id="password1" name="password1" oninput='pasahitzaKonp()'oninput='denaOndo()' placeholder="Pasahitza *" required>
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
                        <input type="password" name="password2" id='password2' placeholder="Pasahitza konfirmatu"  oninput='pasahitzakBerdin()' oninput='denaOndo()' required><br>
                        <!-- Korreoa -->
                        <input type="email" id='korreoa' name="korreoa" placeholder="Posta elektronikoa jarri" oninput='korreoaOndo()' oninput='denaOndo()' required ><br>
                        <!-- Termino legalak onartu-->
                        <input type="checkbox" id="terminoLegalak" name="terminoLegalak" value="Boat" onclick='denaOndo()'>
                        <label for="terminoLegalak">Termino legalak onartzen ditut.</label><br>
                        <!-- Izena eman -->
                        <input type="submit" id='register'name="btn1" value="Register" onclick="erregistratu()" disabled >
                        <!-- Bazkide naiz botoia - Sartzeko modal-a erakutsi -->
                        <button onclick="if(lafuncionDeOhiane == true){muestraLaOtraVentana}else{muestraLaMismaVentana} bazkideaSartu(this.id)" id="bazkideNaiz">Bazkidea naiz dagoeneko</button>
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