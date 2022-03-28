<?php 


    function itemCarousel($layer, $item_names){
        echo "<div class='flex justify-center p-6 space-x-3'>";
        printItemTile($layer, $item_names[0]);
        printItemTile($layer, $item_names[1]);
        printItemTile($layer, $item_names[2]);
        echo "</div>";
        echo "<div class='flex justify-center p-6 space-x-3'>";
        printItemTile($layer ,$item_names[3]);
        printItemTile($layer ,$item_names[4]);
        printItemTile($layer ,$item_names[5]);
        echo "</div>";
    };

?>