<?php

    if ($_SESSION['cat_id']=='not set'){
        header('./index');
        exit();     
    }
    include_once('../backend/tile.php');
    foreach ($item_data as $item){
        printTile(mapItemDataToTile($item));
    }


?>