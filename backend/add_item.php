<?php

    // BACKEND
    $category_data = DatabaseConnector::getCategoryLinkData();
    $options = array();
    foreach($category_data as $c){
        array_push($options, $c["cat_name"]);
    }
    console(json_encode($category_data));
    console(json_encode($options));

?>