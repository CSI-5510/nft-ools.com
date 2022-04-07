<?php

class Order {

	public static function isUsersListing($itemid, $userid)
	{
		//check to see if the itemid belongs to the given userid
		if (DatabaseConnector::query('SELECT owner_id FROM item WHERE i_id=:id AND owner_id=:ownerid', array(':id'=>$itemid,':ownerid'=>$userid))) {
			return true;
			} else {
		return false;			
			}
	}

	public static function isItemOpen($itemid)
	{
		//check to see if the item has an open order
		//also checks to see if a seller exists already
		if (DatabaseConnector::query('SELECT o_id FROM orders WHERE o_item_id=:itemid AND o_status="open" AND o_seller_id IS NULL', array(':itemid'=>$itemid))) {
			return true;
			} else {
		return false;			
			}
	}

	public static function isItemInUserCart($itemid, $userid)
	{
		//check to see if the item is already added to the users cart
		if (DatabaseConnector::query('SELECT cart_id FROM cart WHERE cart_item_id=:itemid AND cart_user_id=:userid', array(':itemid'=>$itemid, ':userid'=>$userid))) {
			return true;
			} else {
		return false;			
			}
	}


	/*
	Validation:
	(1) Make sure item status is "open" and owner_id is null through self::isUsersListing()
	(2) Make sure the user isn't trying to add an item that they own through self::isUserListing
	(3) Make sure the user deosn't already have the item in their cart through self::isItemInUserCart
	(4) Make sure 
	*/

	public static function addItemToCart($itemid, $userid)
	{
		//make sure item is open and available
		if(self::isItemOpen($itemid)){
			//good! the item is open and without a seller id.
			//lets make sure the user isn't adding an item that he already owns
			if(self::isUsersListing($itemid, $userid) == false){
				//since the user doesn't own the item we can proceed!
				if(self::isItemInUserCart($itemid, $userid)== false){
					//since item isn't in the user cart we can proceed
					//looks like the item is ready to add into the cart...
					//lets insert into orders!
					DatabaseConnector::query('INSERT INTO cart(cart_id, cart_item_id, cart_user_id) VALUES (NULL, :userid, :user_id)', array(':itemid'=>$itemid, ':user_id'=>$userid));
				}
			}
		}
	}
	
	public static function removeItemFromCart($itemid, $userid)
	{
			//lets make sure the user isn't removing an item that he already owns
			if(self::isUsersListing($itemid, $userid) == false){
				//since the user doesn't own the item we can proceed!
				//check to see if item is currently in cart.
				if(self::isItemInUserCart($itemid, $userid)== true){
					//since item isn't in the user cart we can proceed
					//looks like the item is ready to add into the cart...
					//lets remove from cart!
					DatabaseConnector::query('DELETE FROM cart WHERE cart_item_id=:itemid AND cart_user_id=:userid', array(':itemid'=>$itemid, ':userid'=>$userid));
				}
			}
	}

	
	public static function getUsersOrdersCount()
	{
		$userid = User::isLoggedIn();
		return DatabaseConnector::query('SELECT COUNT(*) FROM cart WHERE cart_user_id=:userid', array(':userid'=>$userid))[0]['COUNT(*)'];
	}	
}

?>