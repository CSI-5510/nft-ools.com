<?php

$serverName = "35.196.103.19";
$userName = "admin";
$password = "oakland";
$dbName = "NFTools";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemIDin = $_POST['itemID'];
    //echo "<h1>Item ID IN:".$itemIDin."</h1>";
}

$sqlItemEditTable = "SELECT i.i_id, i.i_name, i.i_category_Id, c.cat_name, i.i_serialnum, i.i_description, i.i_image, i.documentation, i.receipt, i.original_purchase_date, i.current_price FROM item i JOIN category c ON i.i_category_Id = c.cat_id WHERE i.i_id = '$itemIDin'";
$resultTable = $conn->query($sqlItemEditTable);

if ($resultTable->num_rows > 0) {
    while ($rowTable = $resultTable->fetch_assoc()) {
        $itemID = $rowTable['i_id'];
        //echo "<h1>Item ID: $itemID</h1>";
        $itemName = $rowTable['i_name'];
        //echo "<h1>Item Name: $itemName</h1>";
        $itemCategoryID = $rowTable['i_category_Id'];
        //echo "<h1>Item Cat ID: $itemCategoryID</h1>";
        $itemCategoryName = $rowTable['cat_name'];
        //echo "<h1>Item Cat Name: $itemCategoryName</h1>";
        $itemSerialNumber = $rowTable['i_serialnum'];
        //echo "<h1>Item SerialNumber: $itemSerialNumber</h1>";
        $itemDescription = $rowTable['i_description'];
        //echo "<h1>Item Desc: $itemDescription</h1>";
        $itemImage = $rowTable['i_image'];
        //echo '<h1>Image: </h1><img src="data:image/jpeg;base64,'.base64_encode($rowTable['i_image']).'"/>';
        $itemDocumentation = $rowTable['documentation'];
        $itemReceipt = $rowTable['receipt'];
        $itemOriginalPurchaseDate = $rowTable['original_purchase_date'];
        $itemPrice = $rowTable['current_price'];
    }
}

$sqlAffidavit = "SELECT a_content from affidavit WHERE a_item_id = '$itemIDin'";
$resultAffidavit = $conn->query($sqlAffidavit);
if ($resultAffidavit->num_rows > 0) {
    while ($rowAffidavit = $resultAffidavit->fetch_assoc()) {
        $itemAffidavit = $rowAffidavit['a_content'];
        //echo "<h1> Item Affidavit: </h1> $itemAffidavit";
    }
}

?>

<!DOCTYPE html>
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
    <a class="navbar-brand" href="../backend/index.php">&nbsp;NFT-ools Admin - ITEM REVIEW</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="#"></a>
            <a class="nav-link active" href="admin.php">&larr;Back to Admin Home</a>
        </div>
    </div>
</nav><br>

<div class="container">
    <h2>Item Listing Approval Form</h2>
    <form method="get" action="../backend/adminApprovalController.php">
        <input type="text" id="itemID" name="itemID" value="24">Item ID
        <input type="submit" class="btn btn-secondary" value="SUBMIT AUTHORIZATION DECISION">
    </form>
</div>

</body>

</html>


