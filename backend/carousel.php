<?php 


    include_once('../backend/tile.php');


    function mapCategoryToCarousel($data){
        $output = array();
        for ($i=0; $i<6; $i++){
            $output[] = mapCategoryToTile($data[$i]);
        }]
        return $output;
    }


    function mapItemToCarousel($data, $pointers){
        $output = array();
        foreach ($pointers as $pointer){
            $output[] = mapItemToTile($data[$pointer]);
        }
        return $output;
    }


    function carousel($data){
        echo "<div class='flex justify-center p-6 space-x-3'>";
        printTile($data[0]);
        printTile($data[1]);
        printTile($data[2]);
        echo "</div>";
        echo "<div class='flex justify-center p-6 space-x-3'>";
        printTile($data[3]);
        printTile($data[4]);
        printTile($data[5]);
        echo "</div>";
    }


?>