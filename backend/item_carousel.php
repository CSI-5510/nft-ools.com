<?php


    $item_carousel_data = getCategoryTiles();


    function itemTileQuery($cat_ID, $button){
        //  return DatabaseConnector::getCategoryTiles();
    }


    function getCategoryTiles(){
        return DatabaseConnector::getCategoryTiles();
    }


    function printItemTile($item_carousel_data){
        echo "
            <div class='w-64 h-64 p-0 m-0 bg-gray-200'>
                <form method='POST'>
                    <input type='text' name='cat_name' value='". $item_carousel_data['cat_name']."' class='w-200 h-20 bottom-0'>
                    <input type='hidden' name='cat_id' value='".$item_carousel_data['cat_id']."' />
                    <input type='image' class='w-full h-full p-0 m-0' name='submit' src='data:image/jpeg;base64,".base64_encode($item_carousel_data['i_image'])."'/>
                </form>
            </div>
        ";
    }


?>