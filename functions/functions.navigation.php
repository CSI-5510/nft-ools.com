<?php

        
    /** assembels text for href attribute
     *
     * @param  mixed $area 'category' or 'item' used for page reference
     * @param  mixed $id id used for db query
     * @return string "/public_html/$area/$id"
     */
    function generalNavigation($area, $id){
        return '/'.$GLOBALS["url_loc"][0].'/'.$area.'/'.$id;
    }

        
    /** navigate to sign in page
     *
     * @return string "/public_html/signin"
     */
    function signInNavigation(){
        return '/'.$GLOBALS["url_loc"][0].'/sign_in';
    }


    function addToCartNavigation($id){
        return '/'.$GLOBALS["url_loc"][0].'/item/'.$id.'/add_to_cart';
    }
    
?>