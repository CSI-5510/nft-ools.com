<?php
    include_once('../backend/item_carousel.php');
    SessionMgmt::initializeCatData($item_carousel_data);
    SessionMgmt::setFromPost('cat_name');
    SessionMgmt::setFromPost('cat_id');
?> 