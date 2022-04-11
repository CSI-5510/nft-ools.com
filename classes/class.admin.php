<?php
    Class Admin{
        public static function getAllNonReviewedItems() {

            $result = DatabaseConnector::query("SELECT i.i_id, i.i_name, i.owner_id, u.fname, u.lname FROM item i JOIN user u ON i.owner_id = u.id WHERE is_approved=0 AND was_reviewed=0", array());
            return $result;
        }
    }
?>