<?php


    function console($var){
        $out = $var;
        if(is_array($var)){
            $out = implode(',', $out);
            $out = '"'.$out.'"';
        }
        echo "
            <script>console.log(".$out.");</script>
        ";
    }

?>