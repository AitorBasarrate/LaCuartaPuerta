<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'PHP/dbKonexioa.php';
        include 'PHP/bazkideAreaBete.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/bazkideArea.css">
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <script src="JS/bazkideArea.js"></script>
    <!-- Hasiera oriko estilua -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="JS/LoginJS.js"></script>
    <script src="JS/HamburguerJS.js"></script>
    <!-- Font family estiloa -->
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <!-- CSS stilo orrialdea -->
    <link rel="stylesheet" href="CSS/IndexCSS.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Orriaren iconoa eta tituloa -->
    <link rel="icon" type="image/png" href="Media/fav-icon1.png">
    <title>La Cuarta Puerta</title>
</head>
<body>
    <div class="content">
        <header>
                <!-- Hemen logoa txertatu behar da -->
            <img class="logo" src="Media/logo-bien.png" alt="Au revoir Shoshanna">
                <!-- Nabigatzailea, bakoitzak beraren orria kargatuko du -->
            <div class="topnav" id="myTopnav">
                <a href="index.php" >HASIERA</a>
                <a href="#news">ASTEKO FILMA</a>
                <a href="+Filma.php">+ FILMA</a>
                <a href="bazkideArea.php" class="active">BAZKIDE AREA</a>
                <a class="LoginBoton" href="#home" onclick="document.getElementById('izenaEman').style.display='block'"><i class="fa fa-fw fa-user"></i> LOGIN</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <!-- HAMBURGUESA, responsive menua -->
                <i class="fa fa-bars"></i>
                </a>
            </div>
        </header>
        <section>
            <!-- Orriaren mamia -->
            <div class="container">
            <!-- Atal hau asteko argazkia ikusteko -->
                <div class="astekoArgazkia">
                    <h1>Hurrengo asteko filma</h1>
                    <?php echo '<img width=40% height=40% src="data:image/jpeg;base64,'.base64_encode( $argazkia ).'"/>';?><hr>
                    <a><?php echo $izenburua;?></a>   
                    
                </div>
                <!-- Igarkizun misteriotsuaren atala -->
                <div class="igarkizunMisteriotsua">
                    <h1>Igarkizun Misteriotsua</h1>
                    <p id="igarkizunMamia"><?php echo $galdera;?></p>
                    <input type="text" id="igarkizunErantzuna">
                    <input type="submit" id="erantzunaBidali" value="Bidali" onmouseover="botoiHandiak(this.id)" onmouseout="botoiTxikiak(this.id)">
                
                </div> 
                <!-- Datu Interesgarriaren atala-->
                <div class="datuInteresgarria">
                    <h1>Datu Interesgarria</h1>
                    <p id="datuInteresgarriaMamia"><?php echo $datua?></p>
                </div>
                <!-- Bazkidearen atala -->
                <div class="bazkideDatuak">
                    <h1>Bazkidearen datuak:</h1>
                    <p>Erabiltzailea: <a></a></p>
                    <p>Puntuazioa: <a></a></p>
                    <p>Posizioa Raking-ean: <a>partephp</a></p>

                    <input type="submit" id="saioaItxi" value="Saioa Itxi" onmouseover="botoiHandiak(this.id)" onmouseout="botoiTxikiak(this.id)">
                </div>
                <!-- Bazkideen ranking-aren atala taula batean egingo dugu -->
                <div class="rankingAtala">
                    <h1>Bazkideekiko Ranking-a</h1>
                    <table>
                        <!-- tr filak dira -->
                        <tr>
                            <!-- td kolumnak -->
                            <td id="bazkide1"><?php echo '1. '.$arrayErabiltzaileIzena[0]?></td>
                        
                            <td id="bazkide2"><?php echo '2. '.$arrayErabiltzaileIzena[1]?></td>
                        
                            <td id="bazkide3"><?php echo '3. '.$arrayErabiltzaileIzena[2]?></td>
                        </tr>
                        <tr>
                        
                            <td id="bazkidePuntuak1"><?php echo $arrayPuntuak[0]?></td>
                        
                            <td id="bazkidePuntuak2"><?php echo $arrayPuntuak[1]?></td>
                        
                            <td id="bazkidePuntuak3"><?php echo $arrayPuntuak[2]?></td>
                        
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!-- Izena emateko MODAL-a -->
    <div class="modal" id="izenaEman"> 
        <div class="row">
            <!-- Ixteko botoia -->
            <span style="cursor: pointer;" onclick="document.getElementById('izenaEman').style.display='none'" class="close-button" title="Close Modal">&times;</span>
            <!-- Kolumna 1 -->
            <div class="column1">
                <h3>Bazkide izatearen abantailak</h3>
                <p>
                    &nbsp; "La cuarta Pared" familian parte hartzen baduzu abantaila pilarekin topatuko zara! Haien artean: 
                    <ul>
                        <li type="square">Hurrengo asteko pelikula zein izango den aurrerapena izango duzu.</li>
                        <li type="square">Pelikuletan komentatu ahalko duzu.</li>
                        <li type="square">Pelikulen kuriositate izkutuak erakutsiko dizkizugu.</li>
                        <li type="square">Beste bazkide batzuekin "Asteko galderan" parte hartu ahalko duzu eta gure ranking-ean sartu!</li>
                    </ul>    
                </p>
            </div>
            <!-- Kolumna 2 -->
            <div class="column2">
            <!-- Izen emateko datuak sartu -->
                <!-- Izena -->
                <input type="text" name="erabiltzailea" placeholder="Erabiltzaile izena *" required><br>
                <!-- Pasahitza -->
                <input type="password" name="password1" placeholder="Pasahitza *" required><br>
                <!-- Pasahitza konfirmatu -->
                <input type="password" name="password2" placeholder="Pasahitza konfirmatu" required><br>
                <!-- Korreoa -->
                <input type="text" name="korreoa" placeholder="Posta elektronikoa jarri" required><br><br>
                <!-- Termino legalak onartu-->
                <input type="checkbox" id="terminoLegalak" name="terminoLegalak" value="Boat">
                <label for="terminoLegalak">Termino legalak onartzen ditut.</label><br><br>
                <!-- Izena eman -->
                <input type="submit" value="Register">
            <!-- Bazkide naiz botoia - Sartzeko modal-a erakutsi -->
            <button onclick="bazkideaSartu(this.id)" id="bazkideNaiz">Bazkidea naiz dagoeneko</button>
            </div>
        </div>
    </div>
    <!-- Sartu MODAL-a -->
    <div class="modal" id="sartu" hidden>
        <div class="row">
            <!-- Ixteko botoia -->
            <span style="cursor: pointer;" onclick="document.getElementById('sartu').style.display='none'" class="close-button" title="Close Modal">&times;</span>
            <!-- Kolumna 1 -->
            <div class="column0">
                <!-- Hemen logoa txertatu behar da -->
                <img class="logo" src="Media/logo-bien-negro.png" alt="Au revoir Shoshanna" style="width:100%;">
            </div>
            
            <!-- Kolumna 2 -->
            <div class="column3">
                <!-- Izen emateko datuak sartu -->
                    <!-- Izena -->
                    <input type="text" name="erabiltzailea" placeholder="Erabiltzaile izena *" required><br>
                    <!-- Pasahitza -->
                    <input type="password" name="password1" placeholder="Pasahitza *" required><br>
                    <!-- Sartu -->
                    <input type="submit" value="logIn">
                    <button onclick="bazkideaSartu(this.id)" id="erregistratuNahi">Ez naiz bazkide, izena eman</button>
                    
            </div>
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