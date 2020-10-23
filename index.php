<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Cuarta Puerta</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="JS/leerCSV.js"></script>
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="CSS/IndexCSS.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS externo que se aplica al boton Login para que se quede en la derecha-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="Media/fav-icon1.png">
</head>
<body>
<div class="content">
    <header>
            <!-- Hemen logoa txertatu behar da -->
        <img class="logo" src="Media/logo-bien.png" alt="Au revoir Shoshanna">
            <!-- Nabigatzailea, bakoitzak beraren orria kargatuko du -->
        <div class="topnav" id="myTopnav">
            <a href="#home" class="active">HASIERA</a>
            <a href="#news">ASTEKO FILMA</a>
            <a href="#contact">+ FILMA</a>
            <a href="#about">BAZKIDE AREA</a>
            <a href="#login" class="nav navbar-nav navbar-right"><i class="fa fa-fw fa-user"></i> LOGIN </a>
            <button onclick="document.getElementById('izenaEman').style.display='block'">LOGEEE</button>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
            </a>
        </div>
            <!-- Nabigatzaile barra, responsive egitean Haamburguesa ateratzen da -->
        <script src="JS/HamburguerJS.js"></script>
    </header>
    <div class="wrapper">
        <div class="item1"><img src="Media/Peliculas/DOGS3.jpg"><p>Reservoir Dogs (1992)</p></div>
        <div class="item2"><img src="Media/Peliculas/INCEPTION2.jpg" style="width: 42%;"></br> Inception (2010 )</div>
        <div class="item3"><img src="Media/Peliculas/IT22.jpg" style="width: 42%;"></br> IT 2 (2019)</div>
    </div>
</div>

    <!-- Izena emateko MODAL-a -->
    <!-- CSS-AN TESTUA KOLORERIK EZ GALTZEKO JARRI BEHAR DA -->
    <div class="modal" id="izenaEman" style="background-color: #e8eddf; opacity: 0.9;">
        
        <div class="row">
            <!-- Ixteko botoia -->
            <span onclick="document.getElementById('izenaEman').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            <!-- Kolumna 1 -->
            <div class="column">
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
            <div class="column">
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
    <div class="modal" id="sartu" hidden style="background-color: #e8eddf; opacity: 0.9;">

        <div class="row">
            <!-- Kolumna 1 -->
            <div class="column">
                <!-- Hemen logoa txertatu behar da -->
                <img class="logo" src="Media/logo-bien-negro.png" alt="<<Au revoir Shoshanna>>" style="width:600px;height:600px;">
            </div>
            
            <!-- Kolumna 2 -->
            <div class="column">
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

            <!-- SARTU ORRIAREN ESTILOAK/STYLE -->
            <style>

                .column {
                float: left;
                width: 40%;
                margin: auto;
                padding: 20px;
                border: 3px solid #242423;
                }

                /* Clear floats after the columns */
                .row:after {
                content: "";
                display: table;
                clear: both;
                }



            </style>
        
            <!-- Ixteko botoiaren funtzioak -->
            <script>
                // Erabiltzaileak <span> (x)-an klik egiterakoan, aurreko orrira bueltatu
                span.onclick = function() {
                    modal.style.display = "none";
                }
                    
                //Modaletik kanpo klik egiterakoan modala itxi egingo da
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            </script>
    </div>

    
            <!-- Sartu div-a erakutsiko duen funtzioa -->
            <script>
                function bazkideaSartu(id) {

                    var sartuDiv = document.getElementById("sartu");
                    var izenaEmanDiv = document.getElementById("izenaEman");

                    if (id == "bazkideNaiz") {
                        sartuDiv.style.display = "block";
                        izenaEmanDiv.style.display = "none";

                    } 
                    
                    if (id == "erregistratuNahi") {
                        izenaEmanDiv.style.display = "block";
                        sartuDiv.style.display = "none";
                    } 

                    
                }
            </script>

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