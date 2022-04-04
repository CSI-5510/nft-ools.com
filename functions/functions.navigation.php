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
        $l = '/'.$GLOBALS["url_loc"][0].'/sign_in';
        return $l;
    }

    
    /** item APIs
     *
     * @param  mixed $id item id
     * @param  mixed $command 
     * @return string returns url
     */
    function itemAPI($id, $command){
        $l = '/'.$GLOBALS["url_loc"][0].'/item/'.$id.'/'.$command;
        return $l;
    }
    
?>