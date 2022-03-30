<?php


    $category_carousel_data = DatabaseConnector::getCategoryTiles();
    SessionMgmt::initializeCatData($category_carousel_data);
    SessionMgmt::setFromPost('cat_name');
    SessionMgmt::setFromPost('cat_id');


?> 