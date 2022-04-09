<?php

$serverName = "35.196.103.19";
$userName = "admin";
$password = "oakland";
$dbName = "NFTools";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemIDin = $_POST['itemID'];
    echo "<h1>Item ID IN:".$itemIDin."</h1>";
}

$sqlItemEditTable = "SELECT i.i_id, i.i_name, i.i_category_Id, c.cat_name, i.i_serialnum, i.i_description, i.i_image, i.documentation, i.receipt, i.original_purchase_date, i.current_price FROM item i JOIN category c ON i.i_category_Id = c.cat_id WHERE i.i_id = '$itemIDin'";
$resultTable = $conn->query($sqlItemEditTable);



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
    <a class="navbar-brand" href="index.php">&nbsp;NFT-ools Admin - ITEM REVIEW</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="#"></a>
            <a class="nav-link active" href="../frontend/admin.php">&larr;Back to Admin Home</a>
        </div>
    </div>
</nav><br>

<div class="container">
    <h2>Item Listing Approval Form</h2>
    <form method="post" action="itemApproveController.php">
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Item ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemID" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemName">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Category</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemCategory">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Serial Number</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemSerialNumber">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemDescription">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Image</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemImage">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Documentation</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemDocumentation">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Receipt</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemReceipt">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Purchase Date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemPurchaseDate">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Purchase Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemPurchasePrice">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Affidavit of Quality</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemAffidavit">
            </div>
        </div>

        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Admin Authorization</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="approvalRadios" id="approvalRadios1" value="approved" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Approved
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="approvalRadios" id="approvalRadios2" value="denied">
                    <label class="form-check-label" for="gridRadios2">
                        Denied
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Approval/Denial Justification</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemJustification">
            </div>
        </div>
        <button type="submit" class="btn btn-secondary">SUBMIT AUTHORIZATION DECISION</button>
    </form>
</div>

</body>

</html>


