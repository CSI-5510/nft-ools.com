<?php 


    include_once('../backend/tile.php');
    function categoryCarousel($data){
        echo "<div class='flex justify-center p-6 space-x-3'>";
        printTile(mapCategoryDataToTile($data[0]));
        printTile(mapCategoryDataToTile($data[1]));
        printTile(mapCategoryDataToTile($data[2]));
        echo "</div>";
        echo "<div class='flex justify-center p-6 space-x-3'>";
        printTile(mapCategoryDataToTile($data[3]));
        printTile(mapCategoryDataToTile($data[4]));
        printTile(mapCategoryDataToTile($data[5]));
        echo "</div>";
    }

?>