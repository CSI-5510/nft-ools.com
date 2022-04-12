<?php

    
    /** draw ac2
     *
     * @return void draws to page
     */
    function ac2(){
        if(URL_LOC_1 == ADD_ITEM){
            drawBlank();
            return;
        }
        drawAddItemButton();
    }
    

    /** draws add item link button
     *
     * @return void draws to page
     */
    function drawAddItemButton(){
        echo '
            <li class="'.ac2_class().'">
                <a href="'.ac2_href().'">
                    <span>
                        Add Item
                    </span>
                </a>
            </li>
        ';        
    }
    

    /** tailwind class contents for ac2
     *
     * @return string tailwind css formatting
     */
    function ac2_class(){
        return AC2_CLASS_ANY;
    }

    
    /** returns ac2's link
     *
     * @return string [root]/public_html/add_item
     */
    function ac2_href(){
        return PROJECT_ROOT.'/'.URL_LOC_0.'/'.ADD_ITEM;
    }
    
    
    /** draws no element
     *
     * @return void draw to page
     */
    function drawBlank(){
        echo '';
    }


?>