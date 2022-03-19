<?php
class General{

//print something from the class
echo "printing from class";
	
/**
 * Function to test connection
 */
public static function checkConnection() {
  return DatabaseConnector::query('SELECT * FROM items',array());
}	
}
?>



