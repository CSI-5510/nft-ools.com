<?php

    class SessionMgmt{


        public static function initializeCatData($data){
            if (isset($_SESSION['cat_data'])){
                return;
            }
            SessionMgmt::setCatData($data);
            return;
        }


        public static function overwriteCatData($data){
            SessionMgmt::setCatData($data);
            return;
        }


        public static function setCatData($data){
            $cat_data = array(count($data));
            $i = 0;
            foreach ($data as $category){
                $cat_data[$i] = SessionMgmt::buildCatDataElement($category);
                $i += 1;
            }
            $_SESSION['cat_data'] = $cat_data;
            return;
        }


        public static function buildCatDataElement($data){
            $element = array();
            $element =[
                "cat_name"=> $data['cat_name'],
                "cat_id"=> $data['cat_id']
            ];
            return $element;
        }



        public static function getCatData(){
            if (isset($_SESSION['cat_data'])){
                return $_SESSION['cat_data'];
            }
            return 'cat_data not set';
        }

            
        /**
         * get - get the $_SESSION variable specified
         *
         * @param  string $var - $_SESSION variable name
         * @return string - value of $_SESSION varible or 
         */
        public static function get(string $var){
            if (isset($_SESSION[$var])){
                return $_SESSION[$var];
            }
            return $var.' not set';
        }


        public static function set($var, $val){
            $_SESSION[$var] = $val;
            return;
        }


        public static function setFromPost($var){
            if (isset($_POST[$var])){
                SessionMgmt::set($var, $_POST[$var]);
                return;
            }
            return 'no '.$var.' posted';
        }


        public static function echoCatDataElement($index, $key){
            $data = SessionMgmt::get('cat_data');
            echo $data[$index][$key];
        }

    }
?>