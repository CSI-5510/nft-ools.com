<?php
class General{
	
/**
 * Function to test connection
 */
public static function checkConnection() {
  return DatabaseConnector::query('SELECT * FROM item',array());
}	
}
?>



