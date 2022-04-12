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
	
	if(isset($GLOBALS['url_loc'][3])){
		
		try{
			
			switch($GLOBALS['url_loc'][2]){
				case REVIEW:
					$itemAndCategory = admin::getItemAndCategory($GLOBALS['url_loc'][3]);
					$itemAffidavit = admin::getAffidavit($GLOBALS['url_loc'][3]);	
					//assigns item information
					foreach($itemAndCategory as $rowTable){
						$itemID = $rowTable['i_id'];
						//echo "<h1>Item ID: $itemID</h1>";
						$itemName = $rowTable['i_name'];
						//echo "<h1>Item Name: $itemName</h1>";
						$itemCategoryID = $rowTable['i_category_Id'];
						//echo "<h1>Item Cat ID: $itemCategoryID</h1>";
						$itemCategoryName = $rowTable['cat_name'];
						//echo "<h1>Item Cat Name: $itemCategoryName</h1>";
						$itemSerialNumber = $rowTable['i_serialnum'];
						//echo "<h1>Item SerialNumber: $itemSerialNumber</h1>";
						$itemDescription = $rowTable['i_description'];
						//echo "<h1>Item Desc: $itemDescription</h1>";
						$itemImage = $rowTable['i_image'];
						//echo '<h1>Image: </h1><img src="data:image/jpeg;base64,'.base64_encode($rowTable['i_image']).'"/>';
						$itemDocumentation = $rowTable['documentation'];
						$itemReceipt = $rowTable['receipt'];
						$itemOriginalPurchaseDate = $rowTable['original_purchase_date'];
						$itemPrice = $rowTable['current_price'];
					}
					break;
				case "submit":
					$itemID = $GLOBALS['url_loc'][3];
					$itemApprovedRadiosIn = $_POST['approvalRadios'];
					$itemApprovalJustificationIn = $_POST['itemJustification'];
					echo $itemApprovedRadiosIn;echo "ZZZZZZZZZ";
					echo $itemApprovalJustificationIn;
					echo "ZZZZZZZZZ";
					echo $itemID;				
				$isListingApproved = admin::approveListing($itemApprovedRadiosIn,$itemApprovalJustificationIn,$itemIDin);
					break;
				case REMOVE_FROM_CART:
					Order::removeItemFromCart($item_data['i_id'], $signed_in);
					break;				
				case EDIT:
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