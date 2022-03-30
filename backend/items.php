<?php

    include_once('../backend/item_data.php');
    $item_data = DatabaseConnector::getItems($_SESSION['cat_id']);


?>