<?php 
    
    try{
        switch($GLOBALS['url_loc'][3]){
            case $ADD_TO_CART:
                alertBox($item_data['i_name'].' at $'.$item_data['i_price']);
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
            if(User::isLoggedIn()){
                drawAddToCartButton($item_data['i_id'], $BLUE_BUTTON, $ADD_TO_CART); 
            } else {   
                drawSignInButton('Sign In to Purchase', $BLUE_BUTTON); 
            }
        ?>
    </div>
</div>
<div id="lineage" class="p-4 m-10 bg-green-100 text-center">
    lineage
</div>