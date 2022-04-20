<?php
    
    /** prints $var to console
     * console
     *
     * @param  mixed $var - use with foreach(json_encode($var)) for objects, use in recursive function for embedded objects
     * @return void prints script element to page that prints $var to console
     */
    function console($var){
        echo "
            <script>console.log('".json_encode($var)."');</script>
        ";
    }


    function showURL(){
        $i = 0;
        $_r = '';
        foreach($GLOBALS['url_loc'] as $loc){
            $_r = $_r."url_loc [".$i."]: ".$loc."<br>";
            $i++;
        }
        return $_r;
    }


    function varDumpWithWhiteSpace($v){
        echo "<br>";
        var_dump($v);
        echo "<br><br>";
        return;
    }


?>