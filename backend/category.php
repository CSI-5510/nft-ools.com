<?php
	//return user to index if id was not provided...
    if (!$GLOBALS['url_loc'][2]) {
            header("location: ./");
    }
	    //if id for category was specified...
    if (isset($GLOBALS['url_loc'][2])) {
        //check to see if it was a numerical value, if so translate it to the specified category items list.
        if (is_numeric($GLOBALS['url_loc'][2])) {
            //return user to index if the category id does not exist
            if (!DatabaseConnector::getItemsData($GLOBALS['url_loc'][2])) {
				header("location: ./");
            }
			//assign data post validation
			$item_tiles_data = DatabaseConnector::getItemsData($GLOBALS['url_loc'][2]);			
        } else {
			//since a numerical number wasn't provided, return user
			header("location: ./");
		}
	}
?>