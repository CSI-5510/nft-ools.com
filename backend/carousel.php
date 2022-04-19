<?php

    $category_tiles_data = DatabaseConnector::getCategoryCarouselData();
    foreach ($category_tiles_data as $r) {
        var_dump($r[CATEGORY_TABLE_ID]);
    }
    // var_dump(DatabaseConnector::getLastItemAddedByUser());

?> 