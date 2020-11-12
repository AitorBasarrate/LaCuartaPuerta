<?php

// Erregistratzen saiatuko den pertsonaren datuak balidatuko dira hemen

    if(isset($erabIzena) && isset($contra)) {
        $domain = "localhost";
        setcookie("usuario", $erabIzena, time()+3600, "/", $domain);
        setcookie("contraseña", $contra, time()+3600, "/", $domain);
        setcookie("permisos", $baim, time()+3600, "/", $domain);

        echo('crea las cookies');
    }
?>