<?php


    include_once("../frontend/item_carousel.php");
    console(SessionMgmt::get('cat_name'));
    console(SessionMgmt::get('cat_id'));
    itemCarousel($item_carousel_data);


?>