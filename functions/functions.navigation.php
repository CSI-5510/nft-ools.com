<?php

        
    /** assembels text for href attribute
     *
     * @param  array strings for each location in the url in order 0 = left most to n = right most
     * @return string assembeled url
     */
    function generalNavigation($locations){
        $_r = URL_HOME;
        foreach($locations as $location){
            $_r = $_r.'/'.$location;
        }
        return $_r;
    }

        
    /** navigate to sign in page
     *
     * @return string "/public_html/signin"
     */
    function signInNavigation(){
        $l = ''.$GLOBALS['config']['url_root'].'/'.$GLOBALS["url_loc"][0].'/login';
        return $l;
    }

    
    /** item APIs
     *
     * @param  mixed $id item id
     * @param  mixed $command 
     * @return string returns url
     */
    // ../phpstorm/nft-ools/
    function itemURL($id, $command){
        $l = ''.$GLOBALS['config']['url_root'].'/'.$GLOBALS["url_loc"][0].'/'.URL_ITEM.'/'.$id.'/'.$command;
        return $l;
    }
    
?>