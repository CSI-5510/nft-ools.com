<?php

    class SessionMgmt{

        public static function getCategory(){
            if (isset($_SESSION['category'])){
                return $_SESSION['category'];
            }
            return 'not set';
        }

        public static function setCategory($category){
            $_SESSION['category'] = $category;
            return;
        }


        public static function setCategoryFromPost(){
            if (isset($_POST['category'])){
                SessionMgmt::setCategory($_POST['category']);
                return;
            }
            SessionMgmt::setCategory('no post');
            return;
        }

    }
?>