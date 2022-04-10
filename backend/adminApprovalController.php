<?php

$serverName = "35.196.103.19";
$userName = "admin";
$password = "oakland";
$dbName = "NFTools";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemIDin = $_POST['itemID'];
    //echo "<h1>Item ID: $itemIDin</h1>";

    $itemNameIn = $_POST['itemName'];
    $itemCategoryIn = $_POST['itemCategory'];
    $itemSerialNumberIn = $_POST['itemSerialNumber'];
    $itemDescriptionIn = $_POST['itemDescription'];
    $itemPurchaseDateIn = $_POST['itemPurchaseDate'];
    $itemPurchasePriceIn = $_POST['itemPurchasePrice'];
    $itemAffidavitIn = $_POST['itemAffidavit'];
    $itemApprovedRadiosIn = $_POST['approvalRadios'];
    //echo "<h1>Approval Decision: $itemApprovedRadiosIn</h1>";
    $itemApprovalJustificationIn = $_POST['itemJustification'];
}

echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Title </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">&nbsp;NFT-ools Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="#"></a>
            <a class="nav-link active" href="index.php">&larr;Back to NFT-ools</a>
        </div>
    </div>
</nav><br>';

$sql = "UPDATE item SET is_approved=$itemApprovedRadiosIn, rejection_reason='$itemApprovalJustificationIn', was_reviewed=1 WHERE i_id = '$itemIDin'";
if ($conn->query($sql) === TRUE) {
    //console("success");
    echo '<div class="alert alert-success" role="alert">Item approval status was successfully updated! <br><a href="../frontend/admin.php">Return to NFT-ools Admin</a>';
} else {
    //console("failure");
    echo '<div class="alert alert-danger" role="alert">Item approval status was NOT successfully updated! See the webmaster. <br><a href="../frontend/admin.php">Return to NFT-ools Admin</a>';
}
$conn->close();