<?php

    include_once('../backend/tile.php');
    foreach ($item_data as $item){
        printTile(mapItemDataToTile($item));
    }


?>