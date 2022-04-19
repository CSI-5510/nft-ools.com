<?php

    $category_tiles_data = DatabaseConnector::getCategoryCarouselData();
    var_dump($category_tiles_data);
    foreach ($category_tiles_data as $r) {
        var_dump($r[CATEGORY_TABLE_ID]);
    }
    // var_dump(DatabaseConnector::getLastItemAddedByUser());

?> 