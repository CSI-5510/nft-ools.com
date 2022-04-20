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

	
	/** gets category list with no images
	 *
	 * @return array array of category ids and names
	 */
	public static function getCategoryList(){
		$q = 'SELECT DISTINCT 
			'.CATEGORY_TABLE_ID.', 
			'.CATEGORY_TABLE_NAME.' 
		FROM category 
		GROUP BY '.CATEGORY_TABLE_ID.' 
		ORDER BY '.CATEGORY_TABLE_ID;
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

	
	/** returns list of user's items
	 *
	 * @param  mixed $id user id
	 * @return array list of user's items
	 */
	public static function getUserItemsList($id){
		$q = 'SELECT 
				'.ITEM_TABLE_I_ID.', 
				'.ITEM_TABLE_I_NAME.', 
				'.ITEM_TABLE_CURRENT_PRICE.', 
				'.ITEM_TABLE_I_IMAGE.', 
				'.ITEM_TABLE_I_DESCRIPTION.'
			FROM item WHERE '.ITEM_TABLE_OWNER_ID.' = '.$id;
		return DatabaseConnector::query($q);
	}

	
	/** DB query for a single item
	 *
	 * @param  mixed $id item id in item table
	 * @return array [{'i_id', 'i_name', 'current_price', 'i_image', 'i_description'}]
	 */
	public static function getItemData($id){
		$q = 'SELECT '
			.ITEM_TABLE_I_ID.','
			.ITEM_TABLE_I_NAME.','
			.ITEM_TABLE_I_DESCRIPTION.','
			.ITEM_TABLE_CURRENT_PRICE.','
			.ITEM_TABLE_I_IMAGE.','
			.ITEM_TABLE_I_CATEGORY_ID.','
			.ITEM_TABLE_I_SERIALNUM.','
			.ITEM_TABLE_ORIGINAL_PRICE.','
			.ITEM_TABLE_IS_APPROVED.','
			.ITEM_TABLE_OWNER_ID.','
			.ITEM_TABLE_DAYS_TO_MINIMUM_PRICE.','
			.ITEM_TABLE_ORIGINAL_PURCHASE_DATE.','
			.ITEM_TABLE_REJECTION_REASON.','
			.ITEM_TABLE_WAS_REVIEWED.','
			.ITEM_TABLE_TIMESTAMP.'
			FROM item WHERE i_id = '.$id; 
		try{
			return DatabaseConnector::query($q)[0];
		}catch(Exception $e){
			var_dump($e);
			return($e);
		}
	}


	public static function keywordSearch($keyword){
		$q = "SELECT "
			.ITEM_TABLE_I_ID.","
			.ITEM_TABLE_I_NAME.","
			.ITEM_TABLE_CURRENT_PRICE.","
			.ITEM_TABLE_I_IMAGE.","
			.ITEM_TABLE_I_DESCRIPTION." 
			FROM item
			WHERE LOWER(i_name) LIKE '%".$keyword."%'"
		;
		try{
			return self::query($q);
		}catch(Exception $e){
			var_dump($e);
			return($e);
		}
	}

	public static function getItemIDs(){
		$q = 'SELECT i_id,'.ITEM_TABLE_I_CATEGORY_ID.' FROM items ORDER BY '.ITEM_TABLE_I_CATEGORY_ID;
		return self::query($q);
	}


	public static function getUinqueItems($data){
		$old = null;
		$new = null;
		$_r = array();
		foreach($data as $row){
			if(is_null($old)){
				array_push($_r, $row[ITEM_TABLE_I_ID]);
				$old = $row[ITEM_TABLE_I_CATEGORY_ID];
				continue;
			}
			$new = $row[ITEM_TABLE_I_CATEGORY_ID];
			if($new != $old){
				array_push($_r, $row[ITEM_TABLE_I_ID]);
			}
			$old = $new;
		}
	}



	public static function getItemDataNoPics($id){
		$q = 'SELECT '
			.ITEM_TABLE_I_ID.','
			.ITEM_TABLE_I_NAME.','
			.ITEM_TABLE_I_DESCRIPTION.','
			.ITEM_TABLE_CURRENT_PRICE.','
			.ITEM_TABLE_I_CATEGORY_ID.','
			.ITEM_TABLE_I_SERIALNUM.','
			.ITEM_TABLE_ORIGINAL_PRICE.','
			.ITEM_TABLE_IS_APPROVED.','
			.ITEM_TABLE_OWNER_ID.','
			.ITEM_TABLE_DAYS_TO_MINIMUM_PRICE.','
			.ITEM_TABLE_ORIGINAL_PURCHASE_DATE.','
			.ITEM_TABLE_REJECTION_REASON.','
			.ITEM_TABLE_WAS_REVIEWED.','
			.ITEM_TABLE_TIMESTAMP.'
			FROM item WHERE i_id = '.$id; 
		try{
			return DatabaseConnector::query($q)[0];
		}catch(Exception $e){
			var_dump($e);
			return($e);
		}
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
		$q = "INSERT INTO item ("
				.ITEM_TABLE_I_ID.","							
				.ITEM_TABLE_I_NAME.","
				.ITEM_TABLE_I_DESCRIPTION.","
				.ITEM_TABLE_CURRENT_PRICE.","
				.ITEM_TABLE_I_IMAGE.","
				.ITEM_TABLE_I_CATEGORY_ID.","
				.ITEM_TABLE_I_SERIALNUM.","
				.ITEM_TABLE_ORIGINAL_PRICE.","
				.ITEM_TABLE_IS_APPROVED.","
				.ITEM_TABLE_OWNER_ID.","
				.ITEM_TABLE_DAYS_TO_MINIMUM_PRICE.","
				.ITEM_TABLE_RECEIPT.","
				.ITEM_TABLE_DOCUMENTATION.","
				.ITEM_TABLE_ORIGINAL_PURCHASE_DATE.","
				.ITEM_TABLE_REJECTION_REASON.","
				.ITEM_TABLE_WAS_REVIEWED.") 
			VALUES (
				NULL,'"
				.$data[ITEM_TABLE_I_NAME]."','"
				.$data[ITEM_TABLE_I_DESCRIPTION]."',"
				.$data[ITEM_TABLE_CURRENT_PRICE].",
				:image,"
				.$data[ITEM_TABLE_I_CATEGORY_ID].","
				.$data[ITEM_TABLE_I_SERIALNUM].","
				.$data[ITEM_TABLE_ORIGINAL_PRICE].","
				.$data[ITEM_TABLE_IS_APPROVED].","
				.$data[ITEM_TABLE_OWNER_ID].","
				.$data[ITEM_TABLE_DAYS_TO_MINIMUM_PRICE].",
				:r,
				:d,'"
				.$data[ITEM_TABLE_ORIGINAL_PURCHASE_DATE]."','"
				.$data[ITEM_TABLE_REJECTION_REASON]."',"
				.$data[ITEM_TABLE_WAS_REVIEWED]."
		)";
		return DatabaseConnector::query($q,array(":image"=>$data[ITEM_TABLE_I_IMAGE],":r"=>$data[ITEM_TABLE_RECEIPT],":d"=>$data[ITEM_TABLE_DOCUMENTATION]));
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
	public static function getItemEventDataByItem($item_id){
		$q = 'SELECT * FROM events WHERE '.EVENT_TABLE_ITEM_ID.' =' .$item_id.' ORDER BY '.EVENT_TABLE_TIMESTAMP.' DESC';
		try{
			return self::query($q);
		}catch(Exception $e){
			var_dump($e);
			return $e;
		}
	}


	public static function getOrderDataByItem($item_id){
		$q = 'SELECT * FROM orders WHERE '.ORDER_TABLE_ITEM_ID.' = '.$item_id.' ORDER BY '.ORDER_TABLE_TIMESTAMP.' DESC';
		try{
			return self::query($q);
		}catch(Exception $e){
			var_dump($e);
			return $e;
		}
	}


	/*  User Profile update queries
		Pre-Populate Form with Current Account Details
	*/
	public static function getCurrentAccountDetails($id){
		$q = 'SELECT 
				'.USER_TABLE_USERNAME.', 
				'.USER_TABLE_FIRST_NAME.', 
				'.USER_TABLE_LAST_NAME.', 
				'.USER_TABLE_EMAIL.', 
				'.USER_TABLE_ADDR_LINE_1.', 
				'.USER_TABLE_ADDR_LINE_2.', 
				'.USER_TABLE_CITY.', 
				'.USER_TABLE_STATE.', 
				'.USER_TABLE_ZIP.', 
				'.USER_TABLE_PHONE.'  
			FROM user WHERE id ='.$id;
		return self::query($q)[0];
	}
	
	
	/*  User Profile update queries
		Once User has entered in different values, update the entire row with the new/existing form values
	*/
	public static function updateUserProfileInfo($user_id){
		$q = "UPDATE user SET " 
				."username='".$_POST[USER_TABLE_USERNAME]."'"
				.",email='".$_POST[USER_TABLE_EMAIL]."'"
				.",fname='".$_POST[USER_TABLE_FIRST_NAME]."'"
				.",lname='".$_POST[USER_TABLE_LAST_NAME]."'"
				.",addr_line_1='".$_POST[USER_TABLE_ADDR_LINE_1]."'"
				.",addr_line_2='".$_POST[USER_TABLE_ADDR_LINE_2]."'"
				.",city='".$_POST[USER_TABLE_CITY]."'"
				.",state='".$_POST[USER_TABLE_STATE]."'"
				.",zip=".$_POST[USER_TABLE_ZIP]
				.",phone=".$_POST[USER_TABLE_PHONE]
			." WHERE id = ".$user_id;
		self::query($q);
		return; 
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