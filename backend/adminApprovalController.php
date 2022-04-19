<?php


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
            <a class="nav-link active" href="../frontend/admin.php">&larr;Back to NFT-ools</a>
        </div>
    </div>
</nav><br>';



//$sql = "UPDATE item SET is_approved=$itemApprovedRadiosIn, rejection_reason='$itemApprovalJustificationIn', was_reviewed=1 WHERE i_id = '$itemIDIn'";
//echo $sql;
//if ($conn->query($sql) == TRUE) {
   
  //  echo '<div class="alert alert-success" role="alert">Item approval status was successfully updated! <br><a href="../frontend/admin.php">Return to NFT-ools Admin</a>';
	
//} else {
   
  //  echo '<div class="alert alert-danger" role="alert">Item approval status was NOT successfully updated! <br><a href="../frontend/admin.php">Return to NFT-ools Admin</a>';
	
//}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemID = $GLOBALS['url_loc'][2];
    echo $itemID
#inserting message to db	
$msg=admin::saveApprovalMessageToDb($itemID);		
echo $msg;
}
else {
    header("Location: ../index");
}



?>
