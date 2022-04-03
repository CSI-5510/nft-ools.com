<?php

        
    /** assembels text for href attribute
     *
     * @param  mixed $area - 'category' or 'item' used for page reference
     * @param  mixed $id - id used for db query
     * @return string - "/public_html/$area/$id"
     */
    function urlNavigation($area, $id){
        return '/'.$GLOBALS["url_loc"][0].'/'.$area.'/'.$id;
    }

    
?>