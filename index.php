<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Cuarta Puerta</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="JS/leerCSV.js"></script>
    <script src="/JS/leerCSV.js"></script>
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="CSS/IndexCSS.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="Media/fav-icon1.png">
</head>
<body>
    <header>
            <!-- Hemen logoa txertatu behar da -->
        <img class="logo" src="Media/logo-bien.png" alt="<<Au revoir Shoshanna>>">
            <!-- Nabigatzailea, bakoitzak beraren orria kargatuko du -->
        <div class="topnav" id="myTopnav">
            <a href="#home" class="active">HASIERA</a>
            <a href="#news">ASTEKO FILMA</a>
            <a href="#contact">+ FILMA</a>
            <a href="#about">BAZKIDE AREA</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
            </a>
        </div>
            <!-- Nabigatzaile barra, responsive egitean Haamburguesa ateratzen da -->
        <script src="JS/HamburguerJS.js"></script>
    </header>
    <form action="/PHP/datuBaseaBete.php">
        <input type="submit" value="gorde">
    </form>
    <div class="contenedor">
        <div class="grid-container">
            <div class="grid-item item1">1</div>
            <div class="grid-item item2"><img src="Media/Peliculas/BACKTOTHEFUTURE.jpg" class="RegresoFuturo"><br> Regreso Al Futuro (1985)</div>
            <div class="grid-item item3">3</div>  
            <div class="grid-item item4">4</div>
            <div class="grid-item item5">"La idea de un supercriminal que decide entregarse es interesante, 
                                            pero cuando el plan fracasa, 'Honest Thief' se convierte en una
                                            película estándar y tonta de serie b, sin ninguna sorpresa" </div>
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