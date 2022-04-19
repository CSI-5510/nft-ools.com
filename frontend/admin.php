<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php if(!isset($GLOBALS['url_loc'][2])): ?>
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">&nbsp;NFT-ools Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="#"></a>
                <a class="nav-link active" href="<?php echo $GLOBALS['config']['url_root']; ?>/public_html/">&larr;Back to NFT-ools</a>
            </div>
        </div>
    </nav><br>
    <div class="container">
        <h2>NFT-ools Admin Approval Interface</h2>
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
                foreach (Admin::getAllNonReviewedItems() as $item):

                    $itemID = $item["i_id"];
                    $itemName = $item['i_name'];
                    $itemOwnerID = $item['owner_id'];
                    $itemOwnerFname = $item['fname'];
                    $itemOwnerLname = $item['lname'];
            ?>
                <tr>
                    <th scope="row"><?php echo $itemID ?></th>
                    <td><?php echo $itemName ?></td>
                    <td><?php echo $itemOwnerFname . $itemOwnerLname ?></td>
                    <td><a href="<?php echo $GLOBALS['config']['url_root']; ?>/public_html/admin/review/<?php echo $itemID ?>" type="submit" class="btn btn-secondary">Review</a>
                </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>

    </div>
</div>
<?php endif; ?>

<?php if(isset($GLOBALS['url_loc'][3]) && $GLOBALS['url_loc'][2] === "review"): ?>
<!--- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../backend/index.php">&nbsp;NFT-ools Admin - ITEM REVIEW</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="#"></a>
            <a class="nav-link active" href="<?php echo $GLOBALS['config']['url_root']; ?>/public_html/admin/">&larr;Back to Admin Home</a>
        </div>
    </div>
</nav><br>

<div class="container">
    <h2>Item Listing Approval Form</h2>
    <form method="post" action="<?php echo $GLOBALS['config']['url_root']; ?>/public_html/admin/submit/<?php echo $GLOBALS['url_loc'][3]; ?>">
        <!--<input type="text" id="itemID" name="itemID" value="">-->
        <div class="row mb-3">
            <label for="itemID" class="col-sm-2 col-form-label">Item ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemID" name="itemID" value="<?php echo $itemID; ?>" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="itemName" class="col-sm-2 col-form-label">Item Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemName" name="itemName" value="<?php echo $itemName; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="itemCategory" class="col-sm-2 col-form-label">Item Category</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemCategory" name="itemCategory" value="<?php echo $itemCategoryName; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="itemSerialNumber" class="col-sm-2 col-form-label">Item Serial Number</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemSerialNumber" name="itemSerialNumber" value="<?php echo $itemSerialNumber; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="itemDescription" class="col-sm-2 col-form-label">Item Description</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemDescription" name="itemDescription" value="<?php echo $itemDescription; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="itemImage" class="col-sm-2 col-form-label">Item Image</label>
            <div class="col-sm-10">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($itemImage).'">'?>
            </div>
        </div>
        <div class="row mb-3">
            <label for="itemDocumentation" class="col-sm-2 col-form-label">Item Documentation</label>
            <div class="col-sm-10">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($itemDocumentation).'">'?>
            </div>
        </div>
        <div class="row mb-3">
            <label for="itemReceipt" class="col-sm-2 col-form-label">Item Receipt</label>
            <div class="col-sm-10">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($itemReceipt).'">'?>
            </div>
        </div>
        <div class="row mb-3">
            <label for="itemPurchaseDate" class="col-sm-2 col-form-label">Item Purchase Date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemPurchaseDate" name="itemPurchaseDate" value="<?php echo $itemOriginalPurchaseDate; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="itemPurchasePrice" class="col-sm-2 col-form-label">Item Purchase Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemPurchasePrice" name="itemPurchasePrice" value="<?php echo $itemPrice; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="itemAffidavit" class="col-sm-2 col-form-label">Item Affidavit of Quality</label>
            <div class="col-sm-10">
                <textarea id="itemAffidavit" name="itemAffidavit"><?php echo $itemAffidavit; ?></textarea>
            </div>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Admin Authorization</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="approvalRadios" id="approvalRadios1" value="1" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Approved
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="approvalRadios" id="approvalRadios2" value="0">
                    <label class="form-check-label" for="gridRadios2">
                        Denied
                    </label>
                </div>
            </div>
        </fieldset>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Approval/Denial Justification</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="itemJustification" name="itemJustification">
            </div>
        </div>
        <input type="submit" class="btn btn-secondary" value="SUBMIT AUTHORIZATION DECISION">
    </form>
</div>
<?php endif; ?>

<?php if(isset($GLOBALS['url_loc'][3]) && $GLOBALS['url_loc'][2] === "submit"): ?>



<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">&nbsp;NFT-ools Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="#"></a>
            <a class="nav-link active" href="<?php echo $GLOBALS['config']['url_root']; ?>/public_html/admin">&larr;Back to NFT-ools</a>
        </div>
    </div>
</nav><br>
<?php 

if ($isListingApproved) {
    //console("success");
    echo '<div class="alert alert-success" role="alert">Item approval status was successfully updated! <br><a href="../frontend/admin.php">Return to NFT-ools Admin</a>';
} else {
    //console("failure");
    echo '<div class="alert alert-danger" role="alert">Item approval status was NOT successfully updated! See the webmaster. <br><a href="../frontend/admin.php">Return to NFT-ools Admin</a>';
}

?>

<?php endif; ?>

