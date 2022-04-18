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
        drawLabel('fields marked with * are required', REQUIRED FIELDS MESSAGE).
        $CLOSE_ROW.
        
        // OPEN FORM
         '<form method="POST" action="'.$url.'" enctype="multipart/form-data">'.
        
        // ROW TITLE
         $OPEN_ROW.
         drawLabel('TITLE', LISTING_LABEL).
         drawTextInput(ITEM_OBFUSCATED_NAME, LISTING_INPUT_AREA, 45, TRUE, '').
         $CLOSE_ROW.
        
        // ROW CATEGORY
         $OPEN_ROW.
         drawLabel('CATEGORY', LISTING_LABEL).
         drawSelectOption(ITEM_OBFUSCATED_CATEGORY, LISTING_INPUT_AREA, $options).
         $CLOSE_ROW.
        
        // ROW SERIAL NUMBER
         $OPEN_ROW.
         drawLabel('SERIAL NUMBER', LISTING_LABEL).
         drawTextInput(ITEM_OBFUSCATED_SERIAL_NUMBER, LISTING_INPUT_AREA, 11, TRUE, '').
         $CLOSE_ROW.

        // ROW DESCRIPTION
         $OPEN_ROW.
         drawLabel('DESCRIPTION', LISTING_LABEL).
         drawTextArea(ITEM_OBFUSCATED_DESCRIPTION, LISTING_INPUT_AREA, 250, TRUE).
         $CLOSE_ROW.
        
        // ROW IMAGE
         $OPEN_ROW.
         drawLabel('IMAGE', LISTING_LABEL).
         drawFileUpload(ITEM_OBFUSCATED_IMAGE, ITEM_OBFUSCATED_IMAGE, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES).
         $CLOSE_ROW.
        
        // ROW DOCUMENTATION
         $OPEN_ROW.
         drawLabel('DOCUMENTATION', LISTING_LABEL).
         drawFileUpload(ITEM_OBFUSCATED_DOCUMENTATION, ITEM_OBFUSCATED_DOCUMENTATION, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES).
         $CLOSE_ROW.
        
        // ROW RECEIPT
         $OPEN_ROW.
         drawLabel('RECEIPT', LISTING_LABEL).
         drawFileUpload(ITEM_OBFUSCATED_RECEIPT, ITEM_OBFUSCATED_RECEIPT, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES).
         $CLOSE_ROW.
        
        // ROW PURCHASE DATE
         $OPEN_ROW.
         drawLabel('PURCHASE DATE', LISTING_LABEL).
         drawDateInput(ITEM_OBFUSCATED_ORIGINAL_PURCHASE_DATE, LISTING_INPUT_AREA).
         $CLOSE_ROW.
        
        // ROW PURCHASE PRICE
         $OPEN_ROW.
         drawLabel('PURCHASE PRICE', LISTING_LABEL).
         drawTextInput(ITEM_OBFUSCATED_ORIGINAL_PURCHASE_PRICE, LISTING_INPUT_AREA, 20, TRUE, '').
         $CLOSE_ROW.
        
        // ROW AFFIDAVIT OF QUALITY
        //  $OPEN_ROW.
        // drawLabel('AFFIDAVIT OF QUALITY', LISTING_LABEL).
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