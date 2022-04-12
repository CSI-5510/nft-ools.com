<?php

    
    /** draws an affidavit box to the page
     *
     * @param  string $name form name for typed user name field
     * @param  string $verify form name for verification radio button
     * @param  string $text affidavit statement
     * @return void draws to page
     */
    function drawAffidavit($name, $verify, $text){
        echo '
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
        return;
    }

    
    /** draws add item page
     *
     * @return void draws to page
     */
    function drawAddItem(){

        // CONSTANTS
        $OPEN_ROW = '<div class="'.FLEX_ROW_NO_JUSTIFY.'">';
        $CLOSE_ROW = '</div>';
        
        // OPEN FORM
        echo '<form method="POST" action="/'.$GLOBALS["url_loc"][0].'/collector/add_item" enctype="multipart/form-data">';
        
        // ROW TITLE
        echo $OPEN_ROW;
        drawLabel('TITLE', LISTING_LABEL);
        drawTextInput(ADD_ITEM_TITLE, LISTING_INPUT_AREA);
        echo $CLOSE_ROW;
        
        // ROW CATEGORY
        echo $OPEN_ROW;
        drawLabel('CATEGORY', LISTING_LABEL);
        drawSelectOption(ADD_ITEM_CATEGORY, LISTING_INPUT_AREA, $options);
        echo $CLOSE_ROW;
        
        // ROW SERIAL NUMBER
        echo $OPEN_ROW;
        drawLabel('SERIAL NUMBER', LISTING_LABEL);
        drawTextInput(ADD_ITEM_SERIAL_NUMBER, LISTING_INPUT_AREA);
        echo $CLOSE_ROW;

        // ROW DESCRIPTION
        echo $OPEN_ROW;
        drawLabel('DESCRIPTION', LISTING_LABEL);
        drawTextArea(ADD_ITEM_DESCRIPTION, LISTING_INPUT_AREA);
        echo $CLOSE_ROW;
        
        // ROW IMAGE
        echo $OPEN_ROW;
        drawLabel('IMAGE', LISTING_LABEL);
        drawFileUpload(ADD_ITEM_IMAGE, ADD_ITEM_IMAGE, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES);
        echo $CLOSE_ROW;
        
        // ROW DOCUMENTATION
        echo $OPEN_ROW;
        drawLabel('DOCUMENTATION', LISTING_LABEL);
        drawFileUpload(ADD_ITEM_DOCUMENTATION, ADD_ITEM_DOCUMENTATION, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES);
        echo $CLOSE_ROW;
        
        // ROW RECEIPT
        echo $OPEN_ROW;
        drawLabel('RECEIPT', LISTING_LABEL);
        drawFileUpload(ADD_ITEM_RECEIPT, ADD_ITEM_RECEIPT, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES);
        echo $CLOSE_ROW;
        
        // ROW PURCHASE DATE
        echo $OPEN_ROW;
        drawLabel('PURCHASE DATE', LISTING_LABEL);
        drawDateInput(ADD_ITEM_ORIGINAL_PURCHASE_DATE, LISTING_INPUT_AREA);
        echo $CLOSE_ROW;
        
        // ROW PURCHASE PRICE
        echo $OPEN_ROW;
        drawLabel('PURCHASE PRICE', LISTING_LABEL);
        drawTextInput(ADD_ITEM_ORIGINAL_PURCHASE_PRICE, LISTING_INPUT_AREA);
        echo $CLOSE_ROW;
        
        // ROW AFFIDAVIT OF QUALITY
        echo $OPEN_ROW;
        drawLabel('AFFIDAVIT OF QUALITY', LISTING_LABEL);
        drawAffidavit(ADD_ITEM_AFFIDAVIT_NAME, ADD_ITEM_AFFIDAVIT_VERIFY, 'i gaurantee that this thing works...');
        echo $CLOSE_ROW;
        
        // ROW SUBMIT BUTTON
        echo $OPEN_ROW;
        drawSubmitButton(BLUE_BUTTON." mx-40 my-10 w-full");
        echo $CLOSE_ROW;
        
        // CLOSE FORM
        echo '</form>';

        return;
        
    }

?>