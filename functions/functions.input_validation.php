<?php

    function numbersOnly($string){
        $_r = floatval(preg_replace("/[^0-9.]/", "", $string));
        return $_r;
    }

?>