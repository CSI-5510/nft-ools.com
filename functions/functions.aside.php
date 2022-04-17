<?php

    
    /** draw ac2
     *
     * @return void draws to page
     */
    function showAsideAddItem($user_id){
        if(URL_LOC_1 == ADD_ITEM){
            drawBlank();
            return;
        }
        // user_id doesnt work on local host yet: 4-12-2022 10:47
        // if(!$user_id){
        //     drawBlank();
        //     return;
        // }
        drawAddItemButton();
    }
    

    /** draws add item link button
     *
     * @return void draws to page
     */
    function drawAddItemButton(){    
    }
    

    /** tailwind class contents for ac2
     *
     * @return string tailwind css formatting
     */
    function addItemButtonClass(){
        return AC2_CLASS_ANY;
    }

    
    /** returns ac2's link
     *
     * @return string [root]/public_html/add_item
     */
    function addItemButtonHref(){
        return PROJECT_ROOT.'/'.URL_LOC_0.'/'.ADD_ITEM;
    }
    
    
    /** draws no element
     *
     * @return void draw to page
     */
    function drawBlank(){
        echo '';
    }


    function showAsideMyItems($user_id){
        if(URL_LOC_2 == PHP_URL_USER){
            drawBlank();
            return;
        }
        drawMyItemsButton($user_id);
        return;
    }


    function drawMyItemsButton($user_id){
        dra
    }

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



?>