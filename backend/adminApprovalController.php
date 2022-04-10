<?php

$serverName = "35.196.103.19";
$userName = "admin";
$password = "oakland";
$dbName = "NFTools";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $itemIDin = $_GET['itemID'];
    echo "<h1>Item ID: $itemIDin</h1>";
}