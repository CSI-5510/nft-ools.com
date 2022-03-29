<?php


    function itemTileQuery($cat_ID, $button){
        $tile_id = $cat_ID * 1000 + $button;
        //return json_decode(simulateQuery($tile_id));
    }


    function printItemTile($layer, $button){
        // $item = itemTileQuery($button);
        // echo "
        //     <div class='w-200 h-200 p-0 m-0 bg-gray-200' onclick='testFunction();'>
        //         <img class='w-200 h-200 p-0 m-0 object-fill' src='".$item['image']."'>
        //         <p class='w-200 h-20 bottom-0'>
        //             ".$item['name']."
        //         </p>
        //     </div>
        // ";
    }

    

?>