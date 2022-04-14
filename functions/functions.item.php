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
        $url = itemAPI($id, $command);
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
        $url = itemAPI($id, $command);
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
        $url = itemAPI($id, $command);
        return drawLinkButton($text, $url, $format); 
    }

    
    /** draws edit item modal
     *
     * @return void draws to page
     */
    function drawEditItemModal(){
        console('draw edit item modal');
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
                <div id="price" class="p-4 m-10 bg-green-100 text-center">
                    '.$item_data["current_price"].'
                </div>
                <div class="flex flex-row justify-between items-center w-3/10">
                    '.
                        decideEditItemButton($item_data, $is_users_listing, $signed_in, $mute_controls)
                        .
                        decideCartOrSignIn($item_data, $is_users_listing, $signed_in, $mute_controls)
                    .'
                </div>
            </div>
            <div id="lineage" class="p-4 m-10 bg-green-100 text-center">
                lineage
            </div>
        ';
        return;
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
        return;
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


?>