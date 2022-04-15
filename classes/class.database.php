<?php
class DatabaseConnector {

	private static function connect() {
		
		$pdo = new PDO('mysql:host='.$GLOBALS['db_conf']['db_host'].';dbname='.$GLOBALS['db_conf']['db_db'].';charset=utf8mb4', $GLOBALS['db_conf']['db_user'], $GLOBALS['db_conf']['db_pass']);
		//then we tell pdo which password
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;
	}

	
	/** DB query for category hyperlink data
	 *
	 * @return array [{'cat_id', 'cat_name'}, ...]
	 */
	public static function getCategoryLinkData() {
		$q = 'SELECT c.cat_id, c.cat_name 
			FROM category c 
			GROUP BY c.cat_id
			ORDER BY c.cat_id';
		// echo $q;
		return DatabaseConnector::query($q);
	}	
	
	
	/** DB query for Category Carousel data
	*
	* @return array [{'c_id', 'c_name', 'i_image'}, ...]
	*/
   public static function getCategoryCarouselData() {
	   	$q = 'SELECT DISTINCT c.cat_id, c.cat_name, i.i_image 
			FROM category c JOIN item i 
			WHERE i.i_category_id = c.cat_id
			GROUP BY c.cat_id
			ORDER BY c.cat_id';
		// echo $q;
	   	return DatabaseConnector::query($q);
   }

	
	/** DB query for all items in a category
	 *
	 * @param  string $cat_id category to be queried
	 * @return array [{'i_id', 'i_name', 'current_price', 'i_image', 'i_description', 'cat_id'}, ...]
	 */
	public static function getItemsData($id){
		$q = 'SELECT i.i_id, i.i_name, i.current_price, i.i_image, i.i_description, c.cat_id 
			FROM item i INNER JOIN category c ON i.i_category_id = c.cat_id 
			WHERE i.i_category_id = '.$id;
		// echo $q;
		return DatabaseConnector::query($q);
	}

	
	/** DB query for a single item
	 *
	 * @param  mixed $id item id in item table
	 * @return array [{'i_id', 'i_name', 'current_price', 'i_image', 'i_description'}]
	 */
	public static function getItemData($id){
		$q = 'SELECT '
				.ITEM_TABLE_ID.','
				.ITEM_TABLE_NAME.','
				.ITEM_TABLE_CURRENT_PRICE.','
				.ITEM_TABLE_ORIGINAL_PRICE.','
				.ITEM_TABLE_ORIGINAL_PURCHASE_DATE.','
				.ITEM_TABLE_IMAGE.','
				.ITEM_TABLE_DESCRIPTION.','
				.ITEM_TABLE_ORIGINAL_PURCHASE_DATE.'  
			FROM item WHERE i_id = '.$id; 
		// echo $q;
		return DatabaseConnector::query($q)[0];
	}

	
	/** adds item to user's cart
	 *
	 * @param  string $item item id
	 * @param  string $user user id
	 * @return void
	 */
	public static function addToCart($item, $user){
		$q = 'INSERT INTO cart(cart_id, cart_item_id, cart_user_id) VALUES (NULL,'.$item.','.$user.')';
		return DatabaseConnector::query($q);
	}
  

	public static function getLastItemAddedByUser($user_id){
		$q = "SELECT i_id FROM item WHERE owner_id=".$user_id." ORDER BY timestamp DESC";
		return DatabaseConnector::query($q);
	}


	public static function addNewItem($data, $user_id){
		$q = "INSERT INTO item (i_id, i_name, i_description, current_price, i_image, i_category_Id, i_serialnum, original_price, is_approved, owner_id, days_to_minimum_price, receipt, documentation, original_purchase_date, rejection_reason, was_reviewed) VALUES (NULL,'".$data[ITEM_TABLE_NAME]."','".$data[ITEM_TABLE_DESCRIPTION]."',".$data[ITEM_TABLE_CURRENT_PRICE].",:image,".$data[ITEM_TABLE_CATEGORY_ID].",".$data[ITEM_TABLE_SERIAL_NUMBER].",".$data[ITEM_TABLE_ORIGINAL_PRICE].",".$data[ITEM_TABLE_IS_APPROVED].",".$data[ITEM_TABLE_OWNER_ID].",".$data[ITEM_TABLE_DAYS_TO_MINIMUM_PRICE].",:r,:d,'".$data[ITEM_TABLE_ORIGINAL_PURCHASE_DATE]."','".$data[ITEM_TABLE_REJECTION_REASON]."',".$data[ITEM_TABLE_WAS_REVIEWED].")";
		return DatabaseConnector::query($q,array(":image"=>$data[ITEM_TABLE_IMAGE],":r"=>$data[ITEM_TABLE_RECEIPT],":d"=>$data[ITEM_TABLE_DOCUMENTATION]));
	}

	
	/** calls specific query methods on the events table
	 *
	 * @param  string $type from the events section of the constants table (constants/constants.all.php)
	 * @param  mixed $data return data from the event's reducer
	 * @return void 
	 */
	public static function addEvent($type, $data){
		switch($type){
			case EVENT_NEW_ITEM:
				self::newItemEvent($data);
				break;
			case EVENT_TRANSACTION:
				break;
		}
		return;
	}

	
	/** gets first and last name for a given user id
	 *
	 * @param  mixed $user_id
	 * @return void
	 */
	public static function getUserFullName($user_id){
		$q = 'SELECT '.USER_TABLE_FIRST_NAME.','.USER_TABLE_LAST_NAME.' FROM user WHERE '.USER_TABLE_ID.'='.$user_id;
		return self::query($q)[0];
	}

	
	/** returns all rows from order table for a given item id
	 *
	 * @param  mixed $item_id
	 * @return void
	 */
	public static function getItemEvents($item_id){
		$q = 'SELECT * FROM orders WHERE '.EVENT_TABLE_ITEM_ID.' =' .$item_id.' ORDER BY '.EVENT_TABLE_TIMESTAMP.' DESC';
		try{
			return self::query($q);
		}catch(Exception $e){
			var_dump($e);
			return;
		}
	}

	
	/** inserts the "added to items" event into the event table. use when new items are added for the first time
	 *
	 * @param  mixed $data results of functions/functions.add_item.php=>newItemEventReducer()
	 * @return void inserts new item event into event table
	 */
	public static function newItemEvent($data){
		$q = "INSERT INTO orders ("
				//.EVENT_TABLE_ID.","								/*00*/
				//.EVENT_TABLE_TIMESTAMP.","						/*01*/
				.EVENT_TABLE_STATUS.","								/*02*/
				.EVENT_TABLE_ITEM_ID.","							/*03*/
				.EVENT_TABLE_BUYER_ID.","							/*04*/
				.EVENT_TABLE_SELLER_ID.","							/*05*/
				.EVENT_TABLE_TRANSACTION_ID.","						/*06*/
				.EVENT_TABLE_TRANSACTION_AUTHENTICATION_CODE.","	/*07*/
				.EVENT_TABLE_EVENT_DESCRIPTION.","					/*08*/
				.EVENT_TABLE_EVENT_TIMESTAMP						/*09*/
			.") VALUES ("
				//.$data[EVENT_TABLE_ID]."," 								/*00*/
				//.$data[EVENT_TABLE_TIMESTAMP].",'"						/*01*/
				."'".$data[EVENT_TABLE_STATUS]."',"							/*02*/
				.$data[EVENT_TABLE_ITEM_ID].","								/*03*/	
				.$data[EVENT_TABLE_BUYER_ID].","							/*04*/
				.$data[EVENT_TABLE_SELLER_ID]."," 							/*05*/	
				.$data[EVENT_TABLE_TRANSACTION_ID].","						/*06*/
				.$data[EVENT_TABLE_TRANSACTION_AUTHENTICATION_CODE].","		/*07*/
				."'".$data[EVENT_TABLE_EVENT_DESCRIPTION]."',"				/*08*/
				.$data[EVENT_TABLE_EVENT_TIMESTAMP]							/*09*/
			.")";
		try{
			self::query($q);
			return;
		}catch(Exception $e){
			var_dump($e);
			return;
		} 
	}
	
	
	public static function query($query, $params = array()) {
		$statement = self::connect()->prepare($query);
		$statement->execute($params);
		
		
		//if the first keyword in the query is select, then run this.
		if (explode(' ', $query)[0] == 'SELECT' && explode(' ', $query)[1] != 'count(*)'){
			
		$data = $statement->fetchAll();
		return $data;			
		}	
		
		//if the second keyword in the query is select, then run this.
		if (explode(' ', $query)[0] == 'SELECT' && explode(' ', $query)[1] == 'count(*)'){
		$data = $statement->fetch();
		$data = $data['total'];
		return $data;			
		}			
	
	}
	
}