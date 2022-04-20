<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php ?>
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="#"></a>
                <a class="nav-link active" href="<?php echo $GLOBALS['config']['url_root']; ?>/public_html/">&larr;Back to NFTools</a>
            </div>
        </div>
    </nav><br>
    <div class="container">
        <h2>NFT-ools User Item Listing Approvals</h2>
        <table class="table table-striped">
            <thead>
            <tr>
			    <th scope="col">Message Id</th>
                <th scope="col">User Id</th>
				<th scope="col">Item Id</th>
				<th scope="col">Message</th>
                <th scope="col">Timestamp</th>
                <th scope="col">Acknowledged</th>
            </tr>
            </thead>
            <tbody>
            <?php
                foreach (User::getAllMessagesByUser(USER_ID) as $messages):

                    $messageID = $messages["msg_id"];
	            $userID=$messages["uid"];
                    $itemID = $messages["item_id"];
                    $message = $messages["message_body"];
                    $timestamp = $messages["approval_timestamp"];
                    $ackStatus = $messages["is_acknowledged"];
            ?>
                
            <?php
                endforeach;
            ?>
            </tbody>
        </table>

    </div>
</div>


