<?php

$isAdmin = User::isAdmin();

if ($isAdmin) {
    $serverName = "35.196.103.19";
    $userName = "admin";
    $password = "oakland";
    $dbName = "NFTools";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);

    $sqlTable = "SELECT i.i_id, i.i_name, i.owner_id, u.fname, u.lname FROM item i JOIN user u ON i.owner_id = u.id WHERE is_approved=0 AND was_reviewed=0";
    $result = DatabaseConnector::query("SELECT i.i_id, i.i_name, i.owner_id, u.fname, u.lname FROM item i JOIN user u ON i.owner_id = u.id WHERE is_approved=0 AND was_reviewed=0", array())[0];

    foreach ($result as $item) {
        $itemId = $item["i_id"];
        $itemName = $item['i_name'];
        $itemOwnerID = $item['owner_id'];
        $itemOwnerFname = $item['fname'];
        $itemOwnerLname = $item['lname'];
    }

    $resultTable = $conn->query($sqlTable);
} else {
    header("Location: ../index");
}

?>