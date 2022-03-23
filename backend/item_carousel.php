<?php

    function itemTileQuery(){
        $results = DatabaseConnector::query(
            // name
            // price
            // image
            // url
            // query here
        );
        return $results
    }

    function itemTiles(){
        /*
            $results = array();
            for each tile{
                $results[i] = itemTileQuery
            }
            return $results
        */
    }

    function printItemTile(index){
        /*
            echo "html" . itemTilesData[index] "html";
        */
    }

    $itemTilesData = itemTiles();

    

?>