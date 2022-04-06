<?php


    include_once('../functions/functions.tile.php');
    
    /** draws listing label for input instructions
     *
     * @param  mixed $text instructions to display
     * @param  mixed $format $LISTING_LABEL
     * @return void draws to page
     */
    function drawLabel($text, $format){
        echo '
            <div class="'.$format.'">
                '. $text .'
            </div>
        ';
        return;
    }


    /** draws text input area
     *
     * @param  mixed $name form name attribute
     * @param  mixed $format $LISTING_INPUT_AREA
     * @return void draws to page
     */
    function drawTextInput($name, $format){
        echo '
            <input type="text" name="'.$name.'" class="'.$format.'">
        ';
        return;
    }

    
    /** draws input type datetime-local
     *
     * @param  mixed $name form name attribute
     * @param  mixed $format pick a format or add one to constants
     * @return void
     */
    function drawDateInput($name, $format){
        echo '
            <input type="datetime-local" name="'.$name.'" class="'.$format.'">
        ';
    }


    /** draws text area input area
     *
     * @param  mixed $name form name attribute
     * @param  mixed $format $LISTING_INPUT_AREA
     * @return void draws to page
     */
    function drawTextArea($name, $format){
        echo '
            <textarea name="'. $name .'" class="'.$format.'"></textarea>
        ';
        return;
    }


    /** draws a dropzone for single files only
     *
     * @param  string $id for html element's id attribute 
     * @param  mixed $name form name attribute
     * @param  string $message goes in the message box
     * @param  mixed $format $LISTING_DROPZONE
     * @return void draws to page
     */
    function drawDropzone($id, $name, $message, $format){
        echo '
            <div id="'.$id.'" name="'.$name.'" class="'.$format.'" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
                <p>'.$message.'</p>
            </div>
        ';
        return;
    }

    
    /** draws a file upload control
     *
     * @param  mixed $id for html element's id attribute
     * @param  mixed $name form name attribut
     * @param  mixed $format format $LISTING_DROPZONE
     * @param  mixed $accepts file types accepted by input
     * @return void draws to page
     */
    function drawFileUpload($id, $name, $format, $accepts){
        echo '
            <input id="'.$id.'" type="file" name="'.$name.'" class="'.$format.'" accepts="'.$accepts.'">
        ';
    } 



    /** Draws a hyper link button.
     *
     * @param  mixed $text display text
     * @param  mixed $url href attribute's text
     * @return void draws to page
     */
    function drawLinkButton($text, $url, $format){
        echo '
            <a href="'.$url.'" class="'.$format.'">
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
            <a onclick="'.$fn.'" class="'.$format.'">
                '.$text.'
            </a>
        ';
    }

    
    /** adds alert box to top of application area
     *
     * @return void draws to page
     */
    function alertBox($label, $message){
        echo '
            <div id="alert" class="bg-gray-800 text-center py-4 lg:px-4" role="alert">
            <div class="p-2 bg-gray-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-gray-600 uppercase px-2 py-1 text-xs font-bold mr-3">'.$label.':</span>
            <span class="font-semibold mr-2 text-left flex-auto">'.$message.'</span>
            <svg class="fill-current h-6 w-6 text-blue-100" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="removeThis(this);"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </div>
        </div>
        ';
    }

    
    /** draws a submit button
     *
     * @param  mixed $format pick button format from constants.all.php
     * @return void draws to page
     */
    function drawSubmitButton($format){
        echo '
            <input type="submit" value="SUBMIT" class="'.$format.'">
        ';
    }

    
    /** echos back an image sent via post
     *
     * @param  mixed $image id of input element that submitted the image
     * @return void draws to page
     */
    function drawPostedImage($image, $format){
        echo '<image class="'.$format.'" src="'.imageSrc(file_get_contents($_FILES[$image]["tmp_name"])).'"/>';
    }
?>