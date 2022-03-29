<?php

    class SessionMgmt{

        public static function getCategory(){
            if (isset($_SESSION['category'])){
                return $_SESSION['category'];
            }
            return 'not set';
        }

        public static function setCategory($category){
            $_SESSION['category'] = $category
        }

    }
?>