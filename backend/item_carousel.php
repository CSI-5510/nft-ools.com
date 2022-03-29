<?php



    $data = getCategoryTiles();


    function itemTileQuery($cat_ID, $button){
        //  return DatabaseConnector::getCategoryTiles();
    }


    function getCategoryTiles(){
        return DatabaseConnector::getCategoryTiles();
    }


    function printItemTile($data){
        echo "



   
        ";
    }

    

?>