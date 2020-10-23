<?php
    function enkriptatuMD5(string $pasahitza){
        $enkriptatuta = md5($pasahitza);
        return $enkriptatuta;
    }
?>