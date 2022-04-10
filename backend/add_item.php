<?php

    // BACKEND
    $category_data = DatabaseConnector::getCategoryLinkData();
    $options = array();
    $option = array();
    foreach($category_data as $c){
        $option = [
            "value"=>$c["cat_id"],
            "text"=>$c["cat_name"]
        ];
        array_push($options, $option);
    }

?>