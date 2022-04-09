<?php

$serverName = "35.196.103.19";
$userName = "admin";
$password = "oakland";
$dbName = "NFTools";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

$sqlTable = "SELECT i.i_id, i.i_name, i.owner_id, u.fname, u.lname FROM item i JOIN user u ON i.owner_id = u.id";

$resultTable = $conn->query($sqlTable);

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
</nav><br>
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Item ID</th>
            <th scope="col">Item Name</th>
            <th scope="col">Listed By</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if ($resultTable->num_rows > 0) {
                while ($rowTable = $resultTable->fetch_assoc()) {
                    $itemID = $rowTable['i_id'];
                    $itemName = $rowTable['i_name'];
                    $itemOwnerID = $rowTable['owner_id'];
                    $itemOwnerFname = $rowTable['u.fname'];
                    $itemOwnerLname = $rowTable['u.lname'];
                    echo '<tr>';
                    echo '<th scope="row">'.$itemID.'</th>';
                    echo '<td>'.$itemName.'</td>';
                    echo '<td>'.$itemOwnerID.'</td>';
                    echo '<td>'.$itemOwnerFname.$itemOwnerLname.'</td>';
                    echo '<td><form action="../backend/itemApprove.php" method="post"><input type="hidden" id="itemID" name="itemID" value="'.$itemID.'"><button type="submit" class="btn btn-secondary">Review</button></form></td>';
                    echo '</tr>';
                }
            }
        ?>
        <tr>
            <th scope="row">1</th>
            <td>Item 1</td>
            <td>Sal Trupiano</td>
            <td>
                <form action="../backend/itemApprove.php" method="post"><input type="hidden" id="itemID" name="itemID" value="'.$itemID.'"><button type="submit" class="btn btn-secondary">Review</button></form>
            </td>
        </tr>
        </tbody>
    </table>

</div>

</body>

</html>
