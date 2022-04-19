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
		
		
        public static function approveListing($itemApprovedRadiosIn, $itemApprovalJustificationIn, $itemID) {
			if($itemApprovedRadiosIn = 1){
			echo "UPDATE item SET is_approved=1, rejection_reason=".$itemApprovalJustificationIn." WHERE i_id=".$itemID."";
		DatabaseConnector::query('UPDATE item SET is_approved=1, rejection_reason=:itemjustification WHERE i_id=:itemid', array(':itemjustification'=>$itemApprovalJustificationIn, ':itemid'=>$itemID));			
								return true;
			} 

						return self::isItemApproved($itemID);
			        }
		
		public static function isItemApproved($itemID) {
	
	if(DatabaseConnector::query('SELECT i_id FROM item WHERE i_id=:itemid AND is_approved=1', array(':itemid'=>$itemid))){
	return true;
	}
	return false;	

			
        }
        
        public static function saveApprovalMessageToDb($itemId)
        {
            #grab user id
            #$userid = User::isLoggedIn();

		    $q1='SELECT owner_id from item where i_id='.$itemId;
            $userid=DatabaseConnector::query($q1)[0]['owner_id'];
            
            $q='INSERT INTO message (msg_id,uid,item_id,message_body,approval_timestamp,is_acknowledged) VALUES 
            (NULL,'.$userid.','.$itemId.',"Dear User-Your item listing request was approved by NFTools Admin and check your account to know more details",CURRENT_TIMESTAMP,0)';
          
            return DatabaseConnector::query($q);    
        }	
		
		
	
        public static function getAffidavit($itemId) {
            $result = DatabaseConnector::query("SELECT a_content from affidavit WHERE a_item_id = '$itemId'", array())[0]["a_content"];
			return $result;
        }		
    }	
	
	
?>
