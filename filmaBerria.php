<!DOCTYPE html>
<html lang="en">
<head>    
    <?php
        include 'PHP/dbKonexioa.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/filmaBerria.css">
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Comentarios -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
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
            <img class="logo" src="Media/logo-bien.png" alt="Au revoir Shoshanna">
                <!-- Nabigatzailea, bakoitzak beraren orria kargatuko du -->
            <div class="topnav" id="myTopnav">
                <a href="index.php">HASIERA</a>
                <a href="#news">ASTEKO FILMA</a>
                <a href="+Filma.php">+ FILMA</a>
                <a href="bazkideArea.php">BAZKIDE AREA</a>
                <a class="LoginBoton" href="#home" onclick="document.getElementById('izenaEman').style.display='block'"><i class="fa fa-fw fa-user"></i> LOGIN</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <!-- HAMBURGUESA, responsive menua -->
                <i class="fa fa-bars"></i>
                </a>
            </div>
        </header>
        <form>
            <div class="grid-container">
                <div class="grid-item item1">
                    <h3>Sinopsis:</h3>
                    <textarea name="sinopsis" id="sinopsis" maxlength="250" placeholder="Filmaren Sinopsis-a"></textarea>
                </div>
                <div class="grid-item item2">
                    <img width=90% src="Media/Peliculas/INCEPTION2.jpg"/><hr>
                    <input type="text" placeholder="Filmaren Izenburua"></input>
                </div>
                    <div class="grid-item item3" >
                        <h3>Zuzendaria:</h3>
                        <input type="text" placeholder="Filmaren Zuzendaria"></input>
                        <h3>Generoa:</h3>
                        <input type="text" placeholder="Filmaren Generoa"></input>
                    </div>
                    <div class="grid-item item4">
                        <h3>Urtea:</h3>
                        <input type="text" placeholder="Filmaren Urtea"></input>
                        <h3>Balorazioa:</h3>
                        <input type="text" placeholder="Filmaren Balorazioa"></input>
                    </div>
                <div class="grid-item item5">
                    <h3>Kritika:</h3>
                    <textarea name="kritika" id="kritika" maxlength="250" placeholder="Filmaren Kritika"></textarea>
                </div>
                <div class="grid-item item6">
                    <input type="submit" value="Filma Gorde">
                    <input type="reset" value="Datuak Ezabatu">
                </div>
            </div>
        </form>
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