<?php

    if(is_null($item_list)){
        echo "no entries found";
    }
    foreach ($items_list as $item){
        echo drawItemRow($item);
    }


?>