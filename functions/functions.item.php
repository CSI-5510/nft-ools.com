<?php
    
    /** Draws a sign in button.
     *
     * @param string $text display text. use either 'Sign In' or 'Sign In to Purchase'
     * @return void draws to page
     */
    function drawSignInButton($text, $format){
        $url = signInNavigation();
        return drawLinkButton($text, $url, $format);
    }

    
    /** draws an add to cart button 
     *
     * @param  mixed $id item id for sql insert
     * @param  mixed $format format for button from contants.all.php
     * @param  mixed $command command for api from constants.all.php
     * @return void draws to page
     */
    function drawAddToCartButton($id, $format){
        $text = 'Add to Orders';
        $url = generalNavigation(array('orders'));
        return drawLinkButton($text, $url, $format);
    }
	
    /** draws an remove to cart button 
     *
     * @param  mixed $id item id for sql delete
     * @param  mixed $format format for button from contants.all.php
     * @param  mixed $command command for api from constants.all.php
     * @return void draws to page
     */
    function drawRemoveFromCartButton($id, $format, $command){
        $text = 'Remove from Orders';
        $url = "adewew";
        return drawLinkButton($text, $url, $format);
    }
	
	/** draws disabled button
     *
     * @param  mixed $id item id for sql delete
     * @param  mixed $format format for button from contants.all.php
     * @param  mixed $command command for api from constants.all.php
     * @return void draws to page
     */
    function drawPendingButton($format){
        $text = 'Currently In offer';
        return drawDisabledButton($text, $format);
    }
	
	/** draws disabled button
     *
     * @param  mixed $id item id for sql delete
     * @param  mixed $format format for button from contants.all.php
     * @param  mixed $command command for api from constants.all.php
     * @return void draws to page
     */
    function drawUnavailableButton($format){
        $text = 'Not being offered';
        return drawDisabledButton($text, $format);
    }

    
    /** draws the edit item button
     *
     * @param  mixed $id item id
     * @param  mixed $format button format
     * @param  mixed $command
     * @return void draws to page
    */
    function drawEditItemButton($id, $format, $command){
        $text = 'Edit Item';
        $url = generalNavigation(array("item", $id, $command));
        return drawLinkButton($text, $url, $format); 
    }

    
    /** assembels html text for Add Event button
     *
     * @param  int $id the item id for the id column in the id table
     * @param  string $format the string for the class html element attribute
     * @return string the html as a string for the button
     */
    function drawAddEventButton($item_data, $format){
        $text = 'Add Event';
        $url = generalNavigation(array(URL_ADD_EVENT,$item_data[ITEM_TABLE_I_ID]));
        return drawLinkButton($text, $url, $format);
    }

    
    /**
     * decideAddEventButton
     *
     * @param  int $id item id from id column of item table
     * @param  bool $mute the control is hidded when true
     * @param  bool $signed_in the control is hidded when false 
     * @param  bool $is_users_listing the control is hidden when false
     * @return void
     */
    function decideAddEventButton($id, $mute, $signed_in, $is_users_listing){
        if($mute){
            return '';
        }
        if(!$signed_in){
            return '';
        }
        if($is_users_listing){
            return drawAddEventButton($id, BLUE_BUTTON);
        }
        return '';
    }

    
    /** decides whether to draw the edit item button or no button
     *
     * @param  mixed $item_Data
     * @param  mixed $is_users_listing
     * @param  mixed $signed_in
     * @param  mixed $mute
     * @return void makes draw decision
     */
    function decideEditItemButton($item_data, $is_users_listing, $signed_in, $mute){
        if($mute){
            return '';
        }
        if(!$signed_in){
            return '';
        }
        if($is_users_listing){
            return drawEditItemButton($item_data["i_id"], BLUE_BUTTON, URL_EDIT_ITEM);
        }
        return '';
    }

    
    /** decide whether to draw the add to cart button, the sign in button, or no button
     *
     * @param  mixed $item_data
     * @param  mixed $is_users_listing
     * @param  mixed $signed_in
     * @param  mixed $mute
     * @return void makes draw decision
     */
    function decideCartOrSignIn($item_data, $is_users_listing, $signed_in, $mute){

        return drawAddToCartButton($item_data['i_id'], BLUE_BUTTON); 
    }

    
    /** draws the item page
     *
     * @param  mixed $item_data DB query results for item being displayed
     * @param  mixed $is_users_listing does the item belong to the user?
     * @param  mixed $signed_in is the user signed in?
     * @param  mixed $mute should the control be muted in the context of the current page?
     * @return void draws to page
     */
    function drawItemPage($item_data, $order_data, $event_data, $is_users_listing, $signed_in, $mute_controls){
        include_once('../functions/functions.lineage.php');
        echo '
            <div class="grid grid-rows-5 grid-cols-3">
                <h3 class="row-span-1 col-span-2 text-3xl font-bold m-10 mb-0 p-4 bg-gray-200">
                    '.$item_data["i_name"].'
                </h3>
                <image class="row-span-5 col-span-1 p-0 m-5 bg-green-100 text-center" src="'.imageSrc($item_data[ITEM_TABLE_I_IMAGE]).'"/>
                <p class="row-span-4 col-span-2 p-4 m-10 mt-0 bg-gray-200">
                    '.$item_data["i_description"].'>
                </p>
            </div>
            <div class="flex flex-row justify-between items-center">
                <div id="price" class="p-4 m-10 ml-20 text-4xl font-bold text-center">
                    $'.$item_data["current_price"].'
                </div>
                <div class="flex flex-row justify-between items-center w-3/10">'.
                    decideSellButton($item_data[ITEM_TABLE_I_ID]).
                    decideAddEventButton($item_data, $mute_controls, $signed_in, $is_users_listing).
                    decideEditItemButton($item_data, $is_users_listing, $signed_in, $mute_controls).
                    decideCartOrSignIn($item_data, $is_users_listing, $signed_in, $mute_controls).'
                </div>
            </div>
            <div id="lineage" class="p-4 m-10 text-center">
                '.drawLineage($item_data, $order_data, $event_data).'
            </div>
        ';
        return;
    }



    function drawEditItem($options, $item_data){

        // CONSTANTS
        $OPEN_ROW = '<div class="'.FLEX_ROW_JUSTIFY.'">';
        $CLOSE_ROW = '</div>';
        $url = generalNavigation(array(URL_COLLECTOR, URL_EDIT_ITEM));
        $date = str_replace(' ', 'T', $item_data[ITEM_TABLE_ORIGINAL_PURCHASE_DATE]);

        return 

        // REQUIRED FIELDS MESSAGE
        $OPEN_ROW.
        drawLabel('* indicated required field', REQUIRED_FIELDS_MESSAGE).
        $CLOSE_ROW.
        
        // OPEN FORM
         '<form method="POST" action="'.$url.'" enctype="multipart/form-data">'.

        // ITEM ID
        $OPEN_ROW.
        drawHidden(ITEM_OBFUSCATED_ID, $item_data[ITEM_TABLE_I_ID]).
        $CLOSE_ROW.
        
        // ROW TITLE
         $OPEN_ROW.
         drawLabel('<p>TITLE *</p><p class="'.REQUIRED_FIELD_NOTE.'"> 45 characters max</p>', LABEL_LEFT).
         drawNoBlankInput(ITEM_OBFUSCATED_NAME, LISTING_INPUT_AREA, 45, true, $item_data[ITEM_TABLE_I_NAME]).
         $CLOSE_ROW.
        
        // ROW CATEGORY
         $OPEN_ROW.
         drawLabel('<p>CATEGORY *</p><p class="'.REQUIRED_FIELD_NOTE.'"> select from list</p>', LABEL_LEFT).
         drawSelectOption(ITEM_OBFUSCATED_CATEGORY, DROPDOWN_INPUT, $options, $item_data[ITEM_TABLE_I_CATEGORY_ID]).
         $CLOSE_ROW.
        
        // ROW SERIAL NUMBER
         $OPEN_ROW.
         drawLabel('<p>SERIAL NUMBER *</p><p class="'.REQUIRED_FIELD_NOTE.'"> 11 characters max</p>', LABEL_LEFT).
         drawNoBlankInput(ITEM_OBFUSCATED_SERIAL_NUMBER, LISTING_INPUT_AREA, 11, true, $item_data[ITEM_TABLE_I_SERIALNUM]).
         $CLOSE_ROW.

        // ROW DESCRIPTION
         $OPEN_ROW.
         drawLabel('<p>DESCRIPTION *</p><p class="'.REQUIRED_FIELD_NOTE.'"> 300 characters max</p>', LABEL_LEFT).
         drawNoBlankArea(ITEM_OBFUSCATED_DESCRIPTION, LISTING_INPUT_AREA, 300, true, $item_data[ITEM_TABLE_I_DESCRIPTION]).
         $CLOSE_ROW.
        
        // // ROW IMAGE
        //  $OPEN_ROW.
        //  drawLabel('<p>IMAGE *</p><p class="'.REQUIRED_FIELD_NOTE.'">'.ACCEPTED_IMAGE_TYPES.'</p>', LABEL_LEFT).
        //  drawFileUpload(ITEM_OBFUSCATED_IMAGE, ITEM_OBFUSCATED_IMAGE, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES, FALSE).
        //  $CLOSE_ROW.
        
        // // ROW DOCUMENTATION
        //  $OPEN_ROW.
        //  drawLabel('<p>DOCUMENTATION *</p><p class="'.REQUIRED_FIELD_NOTE.'"> '.ACCEPTED_IMAGE_TYPES.'</p>', LABEL_LEFT).
        //  drawFileUpload(ITEM_OBFUSCATED_DOCUMENTATION, ITEM_OBFUSCATED_DOCUMENTATION, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES, FALSE).
        //  $CLOSE_ROW.
        
        // // ROW RECEIPT
        //  $OPEN_ROW.
        //  drawLabel('<p>RECEIPT *</p><p class="'.REQUIRED_FIELD_NOTE.'">'.ACCEPTED_IMAGE_TYPES.'</p>', LABEL_LEFT).
        //  drawFileUpload(ITEM_OBFUSCATED_RECEIPT, ITEM_OBFUSCATED_RECEIPT, LISTING_DROPZONE, ACCEPTED_IMAGE_TYPES, FALSE).
        //  $CLOSE_ROW.
        

        // ROW PURCHASE DATE
         $OPEN_ROW.
         drawLabel('<p>PURCHASE DATE *</p><p class="'.REQUIRED_FIELD_NOTE.'">pick a date</p>', LABEL_LEFT).
         drawDateInput(ITEM_OBFUSCATED_ORIGINAL_PURCHASE_DATE, LISTING_INPUT_AREA, true, $date).
         $CLOSE_ROW.
        
        // ROW PURCHASE PRICE
         $OPEN_ROW.
         drawLabel('<p>PURCHASE PRICE *</p><p class="'.REQUIRED_FIELD_NOTE.'">enter a positive number</p>', LABEL_LEFT).
         drawTextInput(ITEM_OBFUSCATED_ORIGINAL_PURCHASE_PRICE, LISTING_INPUT_AREA, 100, true, $item_data[ITEM_TABLE_ORIGINAL_PRICE]).
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



    function decideSellButton($item_id){
        $item_data = DatabaseConnector::getItemDataNoPics($item_id);
        $flags = getFlags($item_id);
        if($item_data[ITEM_TABLE_OWNER_ID]!==USER_ID){
            return drawBlank();
        }
        if(!$item_data[ITEM_TABLE_IS_APPROVED]){
            return drawBlank();
        }
        if(!$item_data[ITEM_TABLE_WAS_REVIEWED]){
            return drawBlank();
        }
        if($flags[ITEM_TABLE_REJECTED]){
            return drawBlank();
        }
        if($flags[ITEM_TABLE_IN_CART]){
            return drawBlank();
        }
        if($flags[ITEM_TABLE_PENDING_SALE]){
            return drawBlank();
        }        
        if($flags[ITEM_TABLE_LISTED_FOR_SALE]){
            $text = 'Remove Sale Listing';
            $url = generalNavigation(array(URL_COLLECTOR,URL_REMOVE_SALE_LISTING,$item_data[ITEM_TABLE_I_ID]));
            return drawLinkButton($text,$url,BLUE_BUTTON);
        }
        $text = 'Sell Item';
        $url = generalNavigation(array(URL_COLLECTOR,URL_SELL_ITEM,$item_data[ITEM_TABLE_I_ID]));
        return drawLinkButton($text,$url,BLUE_BUTTON);
    }


    function getFlags($item_id){
        $columns = array(ITEM_TABLE_IS_APPROVED,ITEM_TABLE_WAS_REVIEWED,ITEM_TABLE_ADMIN_REVIEW,ITEM_TABLE_REJECTED,ITEM_TABLE_ADDED_TO_SYSTEM,ITEM_TABLE_UPGRADED,ITEM_TABLE_REPAIRED,ITEM_TABLE_LISTED_FOR_SALE,ITEM_TABLE_DELISTED_FROM_SALE,ITEM_TABLE_IN_CART,ITEM_TABLE_PENDING_SALE,ITEM_TABLE_SOLD,ITEM_TABLE_NEW_OWNER_RECEIVED);
        $q = 'SELECT ';
        foreach($columns as $column){
            $q = $q.$column.',';
        }
        $q = substr($q, 0, -1);
        $q = $q.' FROM item WHERE '.ITEM_TABLE_I_ID.' = '.$item_id;
        return DatabaseConnector::query($q)[0];
    }


    function setItemFlag($item_id, $flag){
        $columns = array(
            ITEM_TABLE_ADMIN_REVIEW,ITEM_TABLE_REJECTED,ITEM_TABLE_ADDED_TO_SYSTEM,ITEM_TABLE_UPGRADED,ITEM_TABLE_REPAIRED,ITEM_TABLE_LISTED_FOR_SALE,ITEM_TABLE_DELISTED_FROM_SALE,ITEM_TABLE_IN_CART,ITEM_TABLE_PENDING_SALE,ITEM_TABLE_SOLD,ITEM_TABLE_NEW_OWNER_RECEIVED
        );
        $set_index = array_search($flag, $columns, true);
        $i = 0;
        $q = 'UPDATE item SET ';
        foreach($columns as $column){
            $value = '1';
            if($set_index!==$i){
                $value = 'NULL';
            }
            $q = $q.$column.'='.$value.',';
            $i += 1;
        }
        $q = substr($q, 0, -1);
        $q = $q.' WHERE item.'.ITEM_TABLE_I_ID.'='.$item_id;

        DatabaseConnector::query($q)[0];
        return;
    }


    function editItemReducer($post){
        // title
        // category
        // serial number
        // description
        // purchase date
        // purchase price
        $_r = array(
                ITEM_TABLE_I_ID => $post[ITEM_OBFUSCATED_ID],
                ITEM_TABLE_I_NAME => $post[ITEM_OBFUSCATED_NAME],
                ITEM_TABLE_I_CATEGORY_ID => $post[ITEM_OBFUSCATED_CATEGORY],
                ITEM_TABLE_I_SERIALNUM => $post[ITEM_OBFUSCATED_SERIAL_NUMBER],
                ITEM_TABLE_I_DESCRIPTION => $post[ITEM_OBFUSCATED_DESCRIPTION],
                ITEM_TABLE_ORIGINAL_PURCHASE_DATE => $post[ITEM_OBFUSCATED_ORIGINAL_PURCHASE_DATE],
                ITEM_TABLE_ORIGINAL_PRICE => $post[ITEM_OBFUSCATED_ORIGINAL_PURCHASE_PRICE]
        );
        return $_r;
    }


    function editItemQuery($data){
        $q = "UPDATE item SET ";
        $q = $q.ITEM_TABLE_I_NAME."='".$data[ITEM_TABLE_I_NAME]."',";
        $q = $q.ITEM_TABLE_I_CATEGORY_ID.'='.$data[ITEM_TABLE_I_CATEGORY_ID].',';
        $q = $q.ITEM_TABLE_I_SERIALNUM."='".$data[ITEM_TABLE_I_SERIALNUM]."',";
        $q = $q.ITEM_TABLE_I_DESCRIPTION."='".$data[ITEM_TABLE_I_DESCRIPTION]."',";
        $q = $q.ITEM_TABLE_ORIGINAL_PURCHASE_DATE."='".$data[ITEM_TABLE_ORIGINAL_PURCHASE_DATE]."',";
        $q = $q.ITEM_TABLE_ORIGINAL_PRICE.'='.$data[ITEM_TABLE_ORIGINAL_PRICE];
        $q = $q." WHERE item.".ITEM_TABLE_I_ID."=".$data[ITEM_TABLE_I_ID];
        DatabaseConnector::query($q);
        return;
    }


?>