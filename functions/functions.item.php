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
    function drawAddToCartButton($id, $format, $command){
        $text = 'Add to Orders';
        $url = itemURL($id, $command);
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
        $url = itemURL($id, $command);
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
        $url = itemURL($id, $command);
        return drawLinkButton($text, $url, $format); 
    }

    
    /** assembels html text for Add Event button
     *
     * @param  int $id the item id for the id column in the id table
     * @param  string $format the string for the class html element attribute
     * @return string the html as a string for the button
     */
    function drawAddEventButton($id, $format){
        $text = 'Add Event';
        $url = addEventURL($id);
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
            return drawEditItemButton($item_data["i_id"], BLUE_BUTTON, EDIT);
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
        if($mute){
            return '';
        }
        if($is_users_listing){
            return '';
        }
        if($signed_in){
            return drawAddToCartButton($item_data['i_id'], BLUE_BUTTON, ADD_TO_CART); 
        }
        return drawSignInButton('Sign In to Purchase', 'flex '.BLUE_BUTTON);
    }

    
    /** draws the item page
     *
     * @param  mixed $item_data DB query results for item being displayed
     * @param  mixed $is_users_listing does the item belong to the user?
     * @param  mixed $signed_in is the user signed in?
     * @param  mixed $mute should the control be muted in the context of the current page?
     * @return void draws to page
     */
    function drawItemPage($item_data, $is_users_listing, $signed_in, $mute_controls){
        include_once('../functions/functions.lineage.php');
        echo '
            <div class="grid grid-rows-5 grid-cols-3">
                <h3 class="row-span-1 col-span-2 text-2xl font-bold m-10 mb-0 p-4 bg-gray-200">
                    '.$item_data["i_name"].'
                </h3>
                <image class="row-span-5 col-span-1 p-0 m-5 bg-green-100 text-center" src="'.imageSrc($item_data["i_image"]).'"/>
                <p class="row-span-4 col-span-2 p-4 m-10 mt-0 bg-gray-200">
                    '.$item_data["i_description"].'>
                </p>
            </div>
            <div class="flex flex-row justify-between items-center">
                <div id="price" class="p-4 m-10 ml-20 text-4xl font-bold text-center">
                    $'.$item_data["current_price"].'
                </div>
                <div class="flex flex-row justify-between items-center w-3/10">'.
                    decideAddEventButton($item_data, $mute_controls, $signed_in, $is_users_listing).
                    decideEditItemButton($item_data, $is_users_listing, $signed_in, $mute_controls).
                    decideCartOrSignIn($item_data, $is_users_listing, $signed_in, $mute_controls).'
                </div>
            </div>
            <div id="lineage" class="p-4 m-10 text-center">
                '.drawLineage(DatabaseConnector::getItemEvents($item_data[ITEM_TABLE_ID])).'
            </div>
        ';
        return;
    }


?>