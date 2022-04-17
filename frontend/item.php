<?php 
    
    try{
        switch($GLOBALS['url_loc'][3]){
            case $ADD_TO_CART:
				//is item already in the users cart? let the user know
				if($is_item_in_cart){
                alertBox("Item is already in the cart", "Error");
				} else {
				//set $is_item_in_cart to true
				$is_item_in_cart = true;					
				//initial add to order
                alertBox($item_data['i_name'].' at $'.$item_data['current_price'], "Added to orders");
				}
                break;
            case $REMOVE_FROM_CART:
				//is item already in the users cart? let the user know
				if(!$is_item_in_cart){
                alertBox("Item is not in the cart", "Error");
				} else {
				//set $is_item_in_cart to true
				$is_item_in_cart = false;					
				//initial add to order
                alertBox($item_data['i_name'], "Removed from orders");
				}
                break;		
            case $EDIT:
                drawEditItemModal();
                break;
            default:
                break;
        }
    } catch(Exception $e){
        alertBox('malformed url');
    }
?>


<div class="grid grid-rows-5 grid-cols-3">
    <h3 class="row-span-1 col-span-2 text-2xl font-bold m-10 mb-0 p-4 bg-gray-200">
        <?php echo $item_data["i_name"]; ?>
    </h3>
    <image class="row-span-5 col-span-1 p-0 m-5 bg-green-100 text-center" src="<?php echo imageSrc($item_data["i_image"]); ?>"/>
    <p class="row-span-4 col-span-2 p-4 m-10 mt-0 bg-gray-200">
        <?php echo $item_data["i_description"]; ?>
    </p>
</div>
<div class="flex flex-row justify-between items-center">
    <div id="price" class="p-4 m-10 bg-green-100 text-center">
        <?php echo $item_data["i_price"]; ?>
    </div>
    <div class="flex flex-row justify-between items-center w-3/10">
        <?php 
            if($is_users_listing){
                drawEditItemButton($item_data['i_id'], $BLUE_BUTTON, $EDIT);
            } else {
                echo "&nbsp;";
             }
			 //check if user is signed in
            if($signed_in){
				//make sure user doesn't own the listing....
				if(!$is_users_listing){
					//if item is in cart of the user
					if($is_item_in_cart){
						//remove item
						drawRemoveFromCartButton($item_data['i_id'], $BLUE_BUTTON, $REMOVE_FROM_CART);
					} else {
						//make sure item isn't currently pending (in an offer)..
						if(!$is_item_pending){
							if(Order::isItemOpen($item_data['i_id'])){
								//add item button
								drawAddToCartButton($item_data['i_id'], $BLUE_BUTTON, $ADD_TO_CART); 
							} else {
								//draw this button to show the item is not available for offers at all
								drawUnavailableButton($BLUE_BUTTON); 
							}
						} else {
						drawPendingButton($BLUE_BUTTON); 
						}
					}
				}
			} else {   
			drawSignInButton('Sign In to Purchase', $BLUE_BUTTON); 
		}
        ?>
    </div>
</div>
<div id="lineage" class="p-4 m-10 bg-green-100 text-center">
    lineage
</div>