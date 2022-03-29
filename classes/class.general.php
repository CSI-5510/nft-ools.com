<?php

class General {
    public static function checkConnection() {
        return DatabaseConnector::query('SELECT * FROM items) VALUES ()',array());
    }
}

?>