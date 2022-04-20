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
		if (DatabaseConnector::query('SELECT o_id FROM orders WHERE o_item_id=:itemid AND o_status="open" AND o_buyer_id IS NULL', array(':itemid'=>$itemid))) {
			return true;
			} else {
		return false;			
			}
	}
	
	public static function isItemPending($itemid)
	{
		//check to see if the item is pending
		//also returns uid of seller for further validation
		if (DatabaseConnector::query('SELECT o_id FROM orders WHERE o_item_id=:itemid AND o_status="pending" AND o_seller_id IS NOT NULL', array(':itemid'=>$itemid))) {
			return DatabaseConnector::query('SELECT o_id FROM orders WHERE o_item_id=:itemid AND o_status="pending" AND o_seller_id IS NOT NULL', array(':itemid'=>$itemid))[0]['o_seller_id'];
			} else {
		return false;			
			}
	}
	


	public static function isItemInUserCart($itemid, $userid)
	{
		//check to see if the item is already added to the users cart
		if (DatabaseConnector::query('SELECT o_id FROM orders WHERE o_item_id=:itemid AND o_buyer_id=:userid AND o_status="pending"', array(':itemid'=>$itemid, ':userid'=>$userid))) {
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
                    //lets add a seller id to the order!
					DatabaseConnector::query('UPDATE orders SET o_buyer_id=:buyerid, o_status="pending" WHERE o_item_id=:itemid AND o_status="open" AND o_buyer_id IS NULL AND o_seller_id IS NOT NULL', array(':itemid'=>$itemid, ':buyerid'=>$userid));
                }
                else {
                return false;
                }
            } else {
            return false;
            }
        } else {
        return false;
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
					//lets remove the seller_id from the order!
					DatabaseConnector::query('UPDATE orders SET o_buyer_id=NULL, o_status="open" WHERE o_item_id=:itemid AND o_status="pending" AND o_buyer_id=:buyerid', array(':itemid'=>$itemid, ':buyerid'=>$userid));
				}
			}
	}

	
	public static function getUsersOrdersCount()
	{
		$userid = User::isLoggedIn();
		return DatabaseConnector::query('SELECT COUNT(*) FROM orders WHERE o_seller_id=:userid OR o_buyer_id=:userid', array(':userid'=>$userid))[0]['COUNT(*)'];
	}
	
	public static function getUsersOrdersAsSeller()
	{
		$userid = User::isLoggedIn();
		return DatabaseConnector::query('SELECT * FROM orders WHERE o_seller_id=:userid', array(':userid'=>$userid))[0]['COUNT(*)'];
	}

	public static function getUsersOrdersAsBuyer()
	{
		$userid = User::isLoggedIn();
		return DatabaseConnector::query('SELECT o_id, o_item_id, o_seller_id, o_status, i_name, i_image FROM orders o JOIN item as i on o_item_id=i_id WHERE o_buyer_id=:userid', array(':userid'=>$userid));
	}	
	
	public static function completeSuccessfulOrder($item_number, $txn_id)
   {
		$t = 'UPDATE orders SET o_transaction_id=:taxid, o_status="fulfilled" WHERE o_id=:orderid AND o_status="pending" AND o_buyer_id IS NOT NULL AND o_seller_id IS NOT NULL';
var_dump($t);
		DatabaseConnector::query($t, array(':orderid'=>$item_number, ':taxid'=>$txn_id));
    }

	public static function getOrderBuyer($item_number)
   {
	$userid = user::isLoggedIn();
	return DatabaseConnector::query('SELECT o_buyer_id FROM orders o JOIN item as i on o_item_id=i_id WHERE o_buyer_id=:userid and o_item_id=:itemid', array(':itemid'=>$item_number, ':userid'=>$userid));
    }	
	
	//gets order id, price, and name of an item that the user is intending to buy
	public static function getOrderDetails($itemid)
		{
			$userid = User::isLoggedIn();
			return DatabaseConnector::query('SELECT o_id, current_price, i_name FROM orders o JOIN item as i on o_item_id=i_id WHERE o_buyer_id=:userid and o_item_id=:itemid', array(':itemid'=>$itemid, ':userid'=>$userid));
		}			
}

?>