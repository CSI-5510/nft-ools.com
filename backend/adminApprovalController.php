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

$sql = "UPDATE item SET is_approved=$itemApprovedRadiosIn, rejection_reason='$itemApprovalJustificationIn', was_reviewed=1 WHERE i_id = '$itemIDin'";
if ($conn->query($sql) === TRUE) {
    //console("success");
    echo '<div class="alert alert-success" role="alert">Item approval status was successfully updated! <br><a href="../frontend/admin.php">Return to NFT-ools Admin</a>';
} else {
    //console("failure");
    echo '<div class="alert alert-danger" role="alert">Item approval status was NOT successfully updated! See the webmaster. <br><a href="../frontend/admin.php">Return to NFT-ools Admin</a>';
}
$conn->close();