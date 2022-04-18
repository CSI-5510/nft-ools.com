<?php


    include_once('../functions/functions.tile.php');
    

    function drawEmailInput($name, $format, $character_limit, $required, $value){
        $_c = inputValidationLength($character_limit);
        $_r = inputValidationRequired($required);   
        return '
            <input type="text" name="'.$name.'" class="'.$format.'"'.$_c.' '.$_r.'" value="'.$value.'" onkeyup="isValidEmail(this);">
        ';
    }

    function drawNoBlankInput($name, $format, $character_limit, $required, $value){
        $_c = inputValidationLength($character_limit);
        $_r = inputValidationRequired($required);   
        return '
            <input type="text" name="'.$name.'" class="'.$format.'"'.$_c.' '.$_r.'" value="'.$value.'" onkeyup="notBlank(this);">
        ';
    }


    function drawZipInput($name, $format, $required,$value){
        $_min = inputValidationMinLength(4);
        $_max = inputValidationMaxLength(5);
        $_r = inputValidationRequired($required);        
        return '
            <input type="text" name="'.$name.'" class="'.$format.'"'.$_min.' '.$_max.' '.$_r.'" value="'.$value.'" onkeyup="isValidUSZip(this);">
        ';
    }    


    function drawPhoneInput($name, $format, $required, $value){
        $_min = inputValidationMinLength(10);
        $_max = inputValidationMaxLength(10);
        $_r = inputValidationRequired($required);        
        return '
            <input type="text" name="'.$name.'" class="'.$format.'"'.$_min.' '.$_max.' '.$_r.'" value="'.$value.'" onkeyup="isValidPhoneNumber(this);">
        ';
    }  


    /** draws listing label for input instructions
     *
     * @param  mixed $text instructions to display
     * @param  mixed $format LABEL_LEFT
     * @return string
     */
    function drawLabel($text, $format){
        return '
            <div class="'.$format.'">
                '. $text .'
            </div>
        ';
    }


    /** draws text input area
     *
     * @param  string $name form name attribute
     * @param  string $format LISTING_INPUT_AREA
     * @param  int $character_limit -1 for no limit. if > 0 sets minlength to 1 and maxlength to value
     * @param  bool $required set required flag
     * @return string
     */
    function drawTextInput($name, $format, $character_limit, $required,$value){
        $_c = inputValidationLength($character_limit);
        $_r = inputValidationRequired($required);        
        return '
            <input type="text" name="'.$name.'" class="'.$format.'"'.$_c.' '.$_r.'" value="'.$value.'">
        ';
    }

    
    /** adds min and max length attributes to html element
     *
     * @param  mixed $character_limit limits less than 0 exclude min/maxlength attributes
     * @return string
     */
    function inputValidationLength($character_limit){
        if($character_limit>0){
            return 'minlength="1" maxlength="'.$character_limit.'"';
        }
        return '';
    }

    
    function inputValidationMinLength($min){
        if($min>0){
            return 'minlength="'.$min.'"';
        }
        return '';
    }


    function inputValidationMaxLength($max){
        if($max>0){
            return 'maxlength="'.$max.'"';
        }
        return '';
    }


    /** adds required attribute to html element
     *
     * @param  mixed $required
     * @return string
     */
    function inputValidationRequired($required){
        if($required){
            return 'required';
        }
        return '';
    }

    
    /** draws input type datetime-local
     *
     * @param  mixed $name form name attribute
     * @param  mixed $format pick a format or add one to constants
     * @return void
     */
    function drawDateInput($name, $format){
        return '
            <input type="datetime-local" name="'.$name.'" class="'.$format.'">
        ';
    }


    /** draws text area input area
     *
     * @param  mixed $name form name attribute
     * @param  mixed $format LISTING_INPUT_AREA
     * @return void draws to page
     */
    function drawTextArea($name, $format, $character_limit, $required){
        $_c = inputValidationLength($character_limit);
        $_r = inputValidationRequired($required);    
        return '
            <textarea name="'. $name .'" class="'.$format.'"'.$_c.$_r.'></textarea>
        ';
    }

    
    /** draws drop down menu
     *
     * @param  mixed $name form name attribute
     * @param  mixed $format pick or add a format to constants/constants.all.php
     * @param  mixed $options list of options for the dropdown, must be 2D: [["value", "text"], ...]
     * @return void draws to page
     */
    function drawSelectOption($name, $format, $options){
        $_r = '<select name="'.$name.'" class="'.$format.'">';
        foreach($options as $option){
            console($option);
            $_r = $_r.'<option value="'.$option["value"].'">'.$option["text"].'</option>';
        }
        $_r = $_r.'</select>';
        return $_r;
    }


    /** draws a dropzone for single files only
     *
     * @param  string $id for html element's id attribute 
     * @param  mixed $name form name attribute
     * @param  string $message goes in the message box
     * @param  mixed $format LISTING_DROPZONE
     * @return string
     */
    function drawDropzone($id, $name, $message, $format){
        return '
            <div id="'.$id.'" name="'.$name.'" class="'.$format.'" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
                <p>'.$message.'</p>
            </div>
        ';
    }

    
    /** draws a file upload control
     *
     * @param  mixed $id for html element's id attribute
     * @param  mixed $name form name attribut
     * @param  mixed $format format LISTING_DROPZONE
     * @param  mixed $accepts file types accepted by input
     * @return string
     */
    function drawFileUpload($id, $name, $format, $accepts){
        return '
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

        return '
            <a href="'.$url.'" class="'.$format.'">
                '.$text.'
            </a>
        ';
    }


    function drawDisabledButton($text, $format){
        return '
            <div '. $format .'>
                '.$text.'
            </div>
        ';
    }
    
    /** Draws a button that perfroms the input function on click
     *
     * @param  mixed $text
     * @param  mixed $fn
     * @return void
     */
    function drawFunctionButton($text, $fn, $format){
        return '
            <a onclick="'.$fn.'" class="'.$format.'">
                '.$text.'
            </a>
        ';
    }

    
    /** adds alert box to top of application area
     *
     * @return void draws to page
     */
    function alertBox($message, $link){
        return '
            <div id="alert" class="bg-gray-800 text-center py-4 lg:px-4" role="alert">
            <div class="p-2 bg-gray-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
            <span class="flex rounded-full bg-gray-600 uppercase px-2 py-1 text-xs font-bold mr-3">'.$link.'</span>
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
        return '
            <input type="submit" id="submit" value="SUBMIT" class="'.$format.'">
        ';
    }

    
    /** echos back an image sent via post
     *
     * @param  mixed $image id of input element that submitted the image
     * @return void draws to page
     */
    function drawPostedImage($image, $format){
        return '<image class="'.$format.'" src="'.imageSrc(file_get_contents($_FILES[$image]["tmp_name"])).'"/>';
    }

    
    /** assembels string for html hiden element
     *
     * @param  string $name should correspond to the column name in the table into which data will be inserted
     * @param  mixed $value the value that will be submitted
     * @return string html hidded input element as a string
     */
    function drawHidden($name, $value){
        return '
            <input type="hidden" name="'.$name.'" value="'.$value.'">
        ';
    }

?>