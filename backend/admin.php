<?php

// site.com/admin/action/id

// site.com/admin/action/id

    /*
        $GLOBALS['url_loc'][0] <-- 'public_html'
        $GLOBALS['url_loc'][1] <-- 'admin'
        $GLOBALS['url_loc'][2] <-- operation as string		
        $GLOBALS['url_loc'][3] <-- item id as string
    */


$isAdmin = User::isAdmin();

if ($isAdmin) {
    $result = Admin::getAllNonReviewedItems();
	//operation as string is not present then get all non reviewed items
    if(!isset($GLOBALS['url_loc'][2])){
		$result = Admin::getAllNonReviewedItems();
		//break
        return;
		//if item id is passed then continue
    }
	//we don't need to check if operation as string exists since we got to here.
	if(isset($GLOBALS['url_loc'][3])){
		try{
			switch($GLOBALS['url_loc'][3]){
				case REVIEW:
					echo "Rwerwe";
					break;
				case $REMOVE_FROM_CART:
					Order::removeItemFromCart($item_data['i_id'], $signed_in);
					break;				
				case $EDIT:
					// modal data
					console('pass modal data');
					break;
				default:
				//returns them back to the default item page
					header("location:./");
					break;
			}
		} catch(Exception $e) {
			$result = $e->getMessage();
		}
	}



} else {
    header("Location: ../index");
}




	













?>