<?php

$serverName = "35.196.103.19";
$userName = "admin";
$password = "oakland";
$dbName = "NFTools";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemIDin = $_POST['itemID'];
    echo "<h1>Item ID: $itemIDin</h1>";

    $itemNameIn = $_POST['itemName'];
    $itemCategoryIn = $_POST['itemCategory'];
    $itemSerialNumberIn = $_POST['itemSerialNumber'];
    $itemDescriptionIn = $_POST['itemDescription'];
    $itemPurchaseDateIn = $_POST['itemPurchaseDate'];
    $itemPurchasePriceIn = $_POST['itemPurchasePrice'];
    $itemAffidavitIn = $_POST['itemAffidavit'];
    $itemApprovedRadiosIn = $_POST['approvalRadios'];
    echo "<h1>Approval Decision: $itemApprovedRadiosIn</h1>";
    $itemApprovalJustificationIn = $_POST['itemJustification'];
}