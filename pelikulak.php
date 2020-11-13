<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Hemen datu basearekiko konexioa egingo da eta behar dituen php-ei detiuko dio -->
    <?php
        include 'PHP/dbKonexioa.php';
    ?>

    <meta charset="UTF-8">
    <title>+Pelikulak</title>
    <!-- Link Bilatzailearen luparen bektorearekin -->
    <!-- Hasiera oriko estilua -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="JS/LoginJS.js"></script>
    <script src="JS/HamburguerJS.js"></script>
    <script src="JS/sesionStorage.js"></script>
    <!-- Font family estiloa -->
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <!-- CSS stilo orrialdea -->
    <link rel="stylesheet" href="CSS/IndexCSS.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/pelikulakArea.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
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
                    <a href="index.php" class="active">HASIERA</a>
                    <a href="astekoFilma.php">ASTEKO FILMA</a>
                    <a href="+Filma.php">+ FILMA</a>
                    <a href="adminArea.html" id="adminArea" >ADMIN AREA</a>
                    <a href="bazkideArea.php" id="bazkideArea1">BAZKIDE AREA</a>
                    <a id="bazkideArea2" onclick="alert('Atal hau ikusi nahi baduzu, erregistratu')">BAZKIDE AREA</a>
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

            <!-- Bilaketa atala -->
            <div id="bilatzailea">

                <!-- Search box -->
                <div id="bilatuBox">
                    <h1>Bilaketa filtroak</h1>
                    <input type="text" id="pelikulaIzenezBilatu" onKeyUp="pelikulaIzenezBilatu()" placeholder="Pelikula bilatu..." title="pelikulaIzenezBilatu" maxlength="50" size="35"> 
                </div>

                <!-- Bilaketa botoia -->
                <!-- <div class="bilaketaBotoia"> -->
                <!-- <img src="https://img.icons8.com/pastel-glyph/2x/search--v1.png" width="30px" height="30px" onclick="pelikulaBilatu()"> -->
                <!-- </div> -->

                <hr>

                <!-- Balorazioa -->
                <div class="balorazioa">
                    <!-- Estrella 1 -->
                    <button id="izar1">
                        <i class="fas fa-star"></i>
                    </button>

                    <!-- Estrella 2 -->
                    <button id="izar2">
                        <i class="fas fa-star"></i>
                    </button>

                    <!-- Estrella 3 -->
                    <button id="izar3">
                        <i class="fas fa-star"></i>
                    </button>

                    <!-- Estrella 4 -->
                    <button id="izar4">
                        <i class="fas fa-star"></i>
                    </button>

                    <!-- Estrella 5 -->
                    <button id="izar5">
                        <i class="fas fa-star"></i>
                    </button>
                </div>    
                
                <hr>

                <!-- Generoa -->
                <div id="genero-lista">
                    <h2>Generoak:</h2>
                    <?php include ('PHP/generoakBete.php');?> 
                </div>
                
                <hr>

                <!-- Data - Urtea -->
                <h2>Urtea:</h2>
                <select id="urtea"></select>
                    <?php include ('PHP/urteakBete.php');?> 
                    <!-- urteak selectean desplegatzeko scripta -->
                    <!-- <script>
                        var hasiera = 1990;
                        var amaiera = new Date().getFullYear();
                        var aukera = "";

                        for (var urtea = amaiera; urtea >= hasiera; urtea--) {
                            aukera += "<option id='" + urtea + "'>" + urtea + "</option>";
                        }

                        document.getElementById("urtea").innerHTML = aukera;

                    </script> -->
                <br> <br>
            </div>

            <!-- Pelikulen lista -->
            <div id="pelikula-lista" class="flex-container">
                <?php include 'PHP/pelikulakPlusBete.php'; ?>
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