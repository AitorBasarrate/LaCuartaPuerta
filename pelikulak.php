<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>+Pelikulak</title>
    <!-- Link Bilatzailearen luparen bektorearekin -->
    <!-- Hasiera oriko estilua -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="JS/LoginJS.js"></script>
    <script src="JS/HamburguerJS.js"></script>
    <script src="JS/index.js"></script>
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
                    <a href="index.php" class="active">HASIERA</a>
                    <a href="#news">ASTEKO FILMA</a>
                    <a href="pelikulak.php">+ FILMA</a>
                    <a href="bazkideArea.php">BAZKIDE AREA</a>
                    <a class="LoginBoton" href="#home" onclick="document.getElementById('izenaEman').style.display='block'"><i class="fa fa-fw fa-user"></i> LOGIN</a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <!-- ESTO ES LA PUTA HAMBURGUESA -->
                    <i class="fa fa-bars"></i>
                    </a>
                </div>
                    <!-- Nabigatzaile barra, responsive egitean Haamburguesa ateratzen da -->
                <script src="JS/HamburguerJS.js"></script>
            </header>
            <!-- Bilaketa atala -->
            <div class="bilatzailea" style="background-color: yellow;">
                <!-- Generoa -->
                <button id="generoaBotoia" onclick="generoakErakutsi()" >Generoa ▼</button>
                <!-- Generoen DIV-en lista -->
                <div class="genero-lista" id="genero-lista" style="width: 400px; height: 250px; background-color: #CFDBD5;" hidden></div>

                    <!-- Script Genero botoiak checkboxak erakusteko -->
                    <script>

                        function generoakErakutsi() {
                            var lista = document.getElementById("genero-lista");

                            if (lista.style.display === "none") {
                                lista.style.display = "block";
                            } else {
                                lista.style.display = "none";
                            }
                        }
                    </script>


                <!-- Balorazioa -->
                <input type="range" min="0" max="5" value="3" class="slider" id="balorazioaSlider">

                <!-- Data - Urtea -->
                <select id="urtea"></select>
                    <!-- urteak selectean desplegatzeko scripta -->
                    <script>
                        var hasiera = 1900;
                        var amaiera = new Date().getFullYear();
                        var aukera = "";

                        for (var urtea = amaiera; urtea >= hasiera; urtea--) {
                            aukera += "<option id='" + urtea + "'>" + urtea + "</option>";
                        }

                        document.getElementById("urtea").innerHTML = aukera;

                    </script>

                <!-- Search box -->
                <input type="text" id="pelikulaIzenezBilatu" onKeyUp="pelikulaIzenezBilatu()" placeholder="Pelikula bilatu..." title="pelikulaIzenezBilatu"> 
                
                <!-- Bilaketa botoia -->
                <img src="https://img.icons8.com/pastel-glyph/2x/search--v1.png" width="30px" height="30px" onclick="pelikulaBilatu()">

                <br> <br>

            </div>

            <!-- Pelikulen lista -->
            <div id="pelikula-lista">

                <style>
                    #pelikula-lista {
                        column-count: 3;
                        column-gap: 40px;
                        column-rule-style: solid;
                        column-rule-color: #F5CB5C; 
                        background-color: gray;
                    }

                </style>
    bLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.najfaj

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