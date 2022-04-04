<?php

    foreach ($item_tiles_data as $item){
        $_item = mapItemToTile($item);
        printTile($_item, generalNavigation('item', $_item['id']));
    }

?>