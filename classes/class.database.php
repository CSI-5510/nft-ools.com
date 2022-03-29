<?php
class DatabaseConnector {

	private static function connect() {
		
		$pdo = new PDO('mysql:host='.$GLOBALS['db_conf']['db_host'].';dbname='.$GLOBALS['db_conf']['db_db'].';charset=utf8mb4', $GLOBALS['db_conf']['db_user'], $GLOBALS['db_conf']['db_pass']);
		//then we tell pdo which password
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;
	}

	/**
	 * Function to get category id, name and image from the category table 
	 */
	public static function getCategoryTiles() {
		return DatabaseConnector::query(
			'SELECT c.cat_id, c.cat_name, i.i_image FROM
			CATEGORY c JOIN ITEM i
			WHERE i.i_category_id = c.cat_id
			GROUP BY c.cat_id
			ORDER BY c.cat_id'
		);
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