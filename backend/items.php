<?php


    if (is_null($_SESSION['cat_id'])){
        echo "<a href='./'> no category selected go home</a>";
        exit();     
    }
    include_once('../backend/item_data.php');
    $item_data = DatabaseConnector::getItems($_SESSION['cat_id']);


?>