<?php


    $category_data = DatabaseConnector::getCategoryTiles();
    SessionMgmt::initializeCatData($category_data);
    SessionMgmt::setFromPost('cat_name');
    SessionMgmt::setFromPost('cat_id');


?> 