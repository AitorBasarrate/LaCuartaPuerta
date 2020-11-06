<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Hemen datu basearekiko konexioa egingo da eta behar dituen php-ei detiuko dio -->
            <?php
                include 'PHP/dbKonexioa.php';
            ?>
        <!-- Hasiera oriko estilua -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <script src="JS/loginKonprobatu.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="JS/HamburguerJS.js"></script>
        <script src="JS/index.js"></script>
        <!-- Font family estiloa -->
        <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <!-- CSS stilo orrialdea -->
        <link rel="stylesheet" href="CSS/IndexCSS.css">
        <link rel="stylesheet" href="CSS/+FilmaCSS.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- izarrak-->
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
                    <a href="index.php">HASIERA</a>
                    <a href="#news">ASTEKO FILMA</a>
                    <a href="+Filma.php" class="active">+ FILMA</a>
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
            <div class="sidebar">
                <!-- BiltuBox-a -->
                <div id="bilatuBox">
                    <h2>Bilaketa filtroak</h2>
                    <hr class="guion-separador">
                    <h3>Filmen Izenburua:</h3>
                    <input type="text" id="pelikulaIzenezBilatu" onKeyUp="pelikulaIzenezBilatu()" placeholder="Pelikula bilatu..." title="pelikulaIzenezBilatu" maxlength="50" size="35"> 
                </div>
                <hr class="guion-separador">
                <!-- Balorazioa -->                
                <div class="stars">
                    <h3>Balorazioa:</h3>
                    <form action="">
                        <input class="star star-5" id="star-5" type="radio" name="star"/>
                        <label class="star star-5" for="star-5"></label>
                        <input class="star star-4" id="star-4" type="radio" name="star"/>
                        <label class="star star-4" for="star-4"></label>
                        <input class="star star-3" id="star-3" type="radio" name="star"/>
                        <label class="star star-3" for="star-3"></label>
                        <input class="star star-2" id="star-2" type="radio" name="star"/>
                        <label class="star star-2" for="star-2"></label>
                        <input class="star star-1" id="star-1" type="radio" name="star"/>
                        <label class="star star-1" for="star-1"></label>
                    </form>
                </div>  
                <hr class="guion-separador">
                <!-- Generoa -->
                <div id="genero-lista">
                    <h3>Generoak:</h3>
                    <?php include ('PHP/generoakBete.php');?> 
                </div>   
                <hr class="guion-separador">
                <div id="anyos">
                <h3>Urtea:</h3>
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
                </div>
            </div>
            <!-- Pelikulen lista -->
                <div id="pelikula-lista" class="flex-container">
                    <?php include 'PHP/pelikulakPlusBete.php'; ?>
                    <script type="text/javascript">var izenburua = "<?= $izenburua ?>";</script>
                    <script type="text/javascript" src="js/filmaIzenak.js"></script>
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