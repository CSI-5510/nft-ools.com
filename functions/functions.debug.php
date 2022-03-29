<?php


    function console($var){
        $out = $var;
        if(is_null($out)){
            console_print($out);
            return;
        }
        if(is_array($out)){
            $out = implode(',', $out);
            $out = '"'.$out.'"';
        }
        console_print($out);
        return;
    }

    function console_print($var){
        echo "
            <script>console.log('".$var."');</script>
        ";
    }


?>