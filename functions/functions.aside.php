<?php


    /** draws no element
     *
     * @return void draw to page
     */
    function drawBlank(){
        return '';
    }

    
    /** assemble HTML string for generic aside button
     *
     * @param  mixed $class html element class attribute value
     * @param  mixed $link html element href attribute value
     * @param  mixed $text displays as button text
     * @return string string for html element
     */
    function drawAsideButton($class, $link, $text){
        return '
            <li class="'.$class.'">
                <a href="'.$link.'">
                    <span>
                        '.$text.'
                    </span>
                </a>
            </li> 
        ';
    }

    
    /** draw Add Item Button
     *
     * @return void draws to page
     */
    function showAsideAddItem($user_id){
        if(URL_LOC_1 == ADD_ITEM){
            return drawBlank();
        }
        // user_id doesnt work on local host yet: 4-12-2022 10:47
        // if(!$user_id){
        //     drawBlank();
        //     return;
        // }
        return drawAddItemButton();
    }
    

    /** draws add item link button
     *
     * @return void draws to page
     */
    function drawAddItemButton(){    
        $class = AC2_CLASS_ANY;
        $link = URL_HOME.'/'.ADD_ITEM;
        $text = 'Add Item';
        return drawAsideButton($class, $link, $text);
    }

    
    /** show/hide My Items Button
     *
     * @param  mixed $user_id
     * @return string html string for my items button
     */
    function showAsideMyItems($user_id){
        if(URL_LOC_2 == URL_USER){
            return drawBlank();
        }
        return drawMyItemsButton($user_id);
        
    }

    
    /** assemble HTML string for My Items Button
     *
     * @param  mixed $user_id
     * @return void
     */
    function drawMyItemsButton($user_id){
        $class = AC2_CLASS_ANY;
        $link = URL_HOME.'/'.URL_CATEGORY.'/'.URL_USER;
        $text = 'My Items';
        return drawAsideButton($class, $link, $text);
    }


    function showAsideProfile($user_id){
        if(URL_LOC_1==URL_PROFILE){
            return drawBlank();
        }
        return drawProfileButton($user_id);
    }


    function drawProfileButton($user_id){
        $class = AC2_CLASS_ANY;
        $link = URL_HOME.'/'.URL_PROFILE;
        $text = 'Profile';
        return drawAsideButton($class, $link, $text);
    }

?>