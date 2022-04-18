<?php

    if(empty($items_list)){
        echo "no entries found";
        return;
    }
    foreach ($items_list as $item){
        echo drawItemRow($item);
    }

    
?>