<?php

    
    /** draws an affidavit box to the page
     *
     * @param  mixed $name form name attribute
     * @param  mixed $text affidavit statement
     * @return void draws to page
     */
    function drawAffidavit($name, $text){
        echo '
            <div name="'.$name.'" class="grid grid-rows-3 gri-cols-2 p-4 m-10 ml-5 mr-40 w-3/5 border-2 border-gray-900"> 
                <div class="row-start-1 row-span-1 col-start-1 col-span-2 p-4 m-2">
                    '. $text .'
                </div>
                <div class="row-start-2 row-span-1 col-start-1 col-span-1 p-4 m-2 text-xl font-bold bg-gray-300">
                    type name
                </div>
                <input type="text" class="row-start-2 row-span-1 col-start-2 col-span-1 p-4 m-2 border-2 border-gray-900">
                <div class="row-start-3 row-span-1 col-start-1 col-span-1 p-4 m-2 text-xl font-bold bg-gray-300">
                    click to verify
                </div>
                <input type="radio" class="row-start-3 row-span-1 col-start-2 col-span-1 p-4 m-2border-2 border-gray-900">
            </div>
        ';
        return;
    }

?>