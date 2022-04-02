<?php
    
    /** prints $var to console
     * console
     *
     * @param  mixed $var - use with foreach(json_encode($var)) for objects, use in recursive function for embedded objects
     * @return void prints script element to page that prints $var to console
     */
    function console($var){
        echo "
            <script>console.log('$var');</script>
        ";
    }


?>