<?php
    include_once("../frontend/item_carousel.php");
    echo SessionMgmt::getCategory();
    itemCarousel($data);
?>