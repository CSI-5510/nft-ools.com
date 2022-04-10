<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div>
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
                    <td><form action="adminItemApprove.php" method="post"><input type="hidden" id="itemID" name="itemID" value="<?php echo $itemID ?>"><button type="submit" class="btn btn-secondary">Review</button></form></td>
                </tr>
            <?php
                endforeach;
            ?>
            </tbody>
        </table>

    </div>
</div>