<?php


    $key_word = str_replace('%20', ' ', URL_LOC_1);
    $items_list = DatabaseConnector::keywordSearch($key_word);


?>