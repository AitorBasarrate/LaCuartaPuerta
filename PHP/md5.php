<?php
/**
 * Metodo honetan string bat sartu, eta MD5-era bihurtzen du.
 */
    function enkriptatuMD5(string $pasahitza){
        $enkriptatuta = md5($pasahitza);
        return $enkriptatuta;
    }
?>