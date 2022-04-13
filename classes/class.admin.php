<?php
    Class Admin{
        public static function getAllNonReviewedItems() {

            $result = DatabaseConnector::query("SELECT i.i_id, i.i_name, i.owner_id, u.fname, u.lname FROM item i JOIN user u ON i.owner_id = u.id WHERE is_approved=0 AND was_reviewed=0", array());
            return $result;
        }
    
	
	
	
        public static function getItemAndCategory($itemId) {

            $result = DatabaseConnector::query("SELECT i.i_id, i.i_name, i.i_category_Id, c.cat_name, i.i_serialnum, i.i_description, i.i_image, i.documentation, i.receipt, i.original_purchase_date, i.current_price FROM item i JOIN category c ON i.i_category_Id = c.cat_id WHERE i.i_id = '$itemId'", array());
			return $result;
        }
		
		
        public static function approveListing($itemApprovedRadiosIn, $itemApprovalJustificationIn, $itemIDin) {
			//update item with approval status
            DatabaseConnector::query("UPDATE item SET is_approved=$itemApprovedRadiosIn, rejection_reason='$itemApprovalJustificationIn', was_reviewed=1 WHERE i_id = '$itemIDin'", array());

            if(DatabaseConnector::query("SELECT FROM item where is_approved=1' WHERE i_id = '$itemIDin'", array())){
			return true;
			} else {
			return false;
        }
		}
		
		
	
        public static function getAffidavit($itemId) {
            $result = DatabaseConnector::query("SELECT a_content from affidavit WHERE a_item_id = '$itemId'", array())[0]["a_content"];
			return $result;
        }		
    }	
	
	
?>