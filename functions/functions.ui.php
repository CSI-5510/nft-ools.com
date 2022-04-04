<?php

    $BLUE_BUTTON =  'class="bg-gray-800 rounded-lg text-gray-100 font-bold text-text-center p-4 m-4 transition duration-300 ease-in-out hover:bg-gray-600"';


    /** Draws a hyper link button.
     *
     * @param  mixed $text display text
     * @param  mixed $url href attribute's text
     * @return void draws to page
     */
    function drawLinkButton($text, $url, $format){
        echo '
            <a href="'.$url.'" '. $format .'>
                '.$text.'
            </a>
        ';
    }

    
    /** Draws a button that perfroms the input function on click
     *
     * @param  mixed $text
     * @param  mixed $fn
     * @return void
     */
    function drawFunctionButton($text, $fn, $format){
        echo '
            <a onclick="'.$fn.'" '. $format .'>
                '.$text.'
            </a>
        ';
    }

    
    /** adds alert box to top of application area
     *
     * @return void draws to page
     */
    function alertBox($message){
        echo '
            <div id="alert" class="bg-gray-800 text-center py-4 lg:px-4" role="alert">
            <div class="p-2 bg-gray-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-gray-600 uppercase px-2 py-1 text-xs font-bold mr-3">Added to Cart:</span>
            <span class="font-semibold mr-2 text-left flex-auto">'.$message.'</span>
            <svg class="fill-current h-6 w-6 text-blue-100" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="removeThis(this);"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </div>
        </div>
        ';
    }
?>