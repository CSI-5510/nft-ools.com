<?php

    /** draws an affidavit box to the page
     *
     * @param  string $name form name for typed user name field
     * @param  string $verify form name for verification radio button
     * @param  string $text affidavit statement
     * @return void draws to page
     */
    function drawAffidavit($name, $verify, $text){
         return '
            <div class="grid grid-rows-3 gri-cols-2 p-4 m-10 ml-5 mr-40 w-3/5 border-2 border-gray-900"> 
                <div class="row-start-1 row-span-1 col-start-1 col-span-2 p-4 m-2">
                    '. $text .'
                </div>
                <div class="row-start-2 row-span-1 col-start-1 col-span-1 p-4 m-2 text-xl font-bold bg-gray-300">
                    type name
                </div>
                <input name="'.$name.'" type="text" class="row-start-2 row-span-1 col-start-2 col-span-1 p-4 m-2 border-2 border-gray-900">
                <div class="row-start-3 row-span-1 col-start-1 col-span-1 p-4 m-2 text-xl font-bold bg-gray-300">
                    click to verify
                </div>
                <input name="'.$verify.'" type="radio" class="row-start-3 row-span-1 col-start-2 col-span-1 p-4 m-2border-2 border-gray-900">
            </div>
        ';
    }

    
    /** draws add item page
     *
     * @return void draws to page
     */
    function drawAddItem($options){

        // CONSTANTS
        $OPEN_ROW = '<div class="'.FLEX_ROW_JUSTIFY.'">';
        $CLOSE_ROW = '</div>';
        $url = generalNavigation(array(URL_COLLECTOR, URL_ADD_ITEM));
        
        return 

        // REQUIRED FIELDS MESSAGE
        $OPEN_ROW.
        drawLabel('fields marked with * are required', REQUIRED_FIELDS_MESSAGE).
        $CLOSE_ROW.
        
        // OPEN FORM
         '<form method="POST" action="'.$url.'" enctype="multipart/form-data">'.
        
        // ROW TITLE
         $OPEN_ROW.
         drawLabel('<p>TITLE *</p><p class="'.REQUIRED_FIELD_NOTE.'"> 45 characters max</p>', LABEL_LEFT).
         drawNoBlankInput(ITEM_OBFUSCATED_NAME, LISTING_INPUT_AREA, 45, TRUE, '').
         $CLOSE_ROW.
        
        // ROW CATEGORY
         $OPEN_ROW.
         drawLabel('<p>CATEGORY *</p><p class="'.REQUIRED_FIELD_NOTE.'"> select from list</p>', LABEL_LEFT).
         drawSelectOption(ITEM_OBFUSCATED_CATEGORY, DROPDOWN_INPUT, $options, '').
         $CLOSE_ROW.
        
        // ROW SERIAL NUMBER
         $OPEN_ROW.
         drawLabel('<p>SERIAL NUMBER *</p><p class="'.REQUIRED_FIELD_NOTE.'"> 11 characters max</p>', LABEL_LEFT).
         drawNoBlankInput(ITEM_OBFUSCATED_SERIAL_NUMBER, LISTING_INPUT_AREA, 11, TRUE, '').
         $CLOSE_ROW.

        // ROW DESCRIPTION
         $OPEN_ROW.
         drawLabel('<p>DESCRIPTION *</p><p class="'.REQUIRED_FIELD_NOTE.'"> 300 characters max</p>', LABEL_LEFT).
         drawNoBlankArea(ITEM_OBFUSCATED_DESCRIPTION, LISTING_INPUT_AREA, 300, TRUE, '').
         $CLOSE_ROW.
        
        // ROW IMAGE
         $OPEN_ROW.
         drawLabel('<p>IMAGE *</p><p class="'.REQUIRED_FIELD_NOTE.'">'.ACCEPTED_IMAGE_TYPES.'</p>', LABEL_LEFT).
         drawFileUpload(ITEM_OBFUSCATED_IMAGE, ITEM_OBFUSCATED_IMAGE, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES, TRUE).
         $CLOSE_ROW.
        
        // ROW DOCUMENTATION
         $OPEN_ROW.
         drawLabel('<p>DOCUMENTATION *</p><p class="'.REQUIRED_FIELD_NOTE.'"> .pdf</p>', LABEL_LEFT).
         drawFileUpload(ITEM_OBFUSCATED_DOCUMENTATION, ITEM_OBFUSCATED_DOCUMENTATION, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES, TRUE).
         $CLOSE_ROW.
        
        // ROW RECEIPT
         $OPEN_ROW.
         drawLabel('<p>RECEIPT *</p><p class="'.REQUIRED_FIELD_NOTE.'">.jpg, .jpeg, or .png</p>', LABEL_LEFT).
         drawFileUpload(ITEM_OBFUSCATED_RECEIPT, ITEM_OBFUSCATED_RECEIPT, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES, TRUE).
         $CLOSE_ROW.
        
        // ROW PURCHASE DATE
         $OPEN_ROW.
         drawLabel('<p>PURCHASE DATE *</p><p class="'.REQUIRED_FIELD_NOTE.'">pick a date</p>', LABEL_LEFT).
         drawDateInput(ITEM_OBFUSCATED_ORIGINAL_PURCHASE_DATE, LISTING_INPUT_AREA, TRUE, date('Y-m-d')).
         $CLOSE_ROW.
        
        // ROW PURCHASE PRICE
         $OPEN_ROW.
         drawLabel('<p>PURCHASE PRICE *</p><p class="'.REQUIRED_FIELD_NOTE.'">enter a positive number</p>', LABEL_LEFT).
         drawTextInput(ITEM_OBFUSCATED_ORIGINAL_PURCHASE_PRICE, LISTING_INPUT_AREA, 100, TRUE, '').
         $CLOSE_ROW.
        
        // ROW AFFIDAVIT OF QUALITY
        //  $OPEN_ROW.
        // drawLabel('AFFIDAVIT OF QUALITY', LABEL_LEFT).
        // drawAffidavit(URL_ADD_ITEM_AFFIDAVIT_NAME, URL_ADD_ITEM_AFFIDAVIT_VERIFY, 'i gaurantee that this thing works...').
        //  $CLOSE_ROW.
        
        // ROW SUBMIT BUTTON
         $OPEN_ROW.
         drawSubmitButton(BLUE_BUTTON." mx-40 my-10 w-full").
         $CLOSE_ROW.
        
        // CLOSE FORM
         '</form>'

        ;
        
    }

?>