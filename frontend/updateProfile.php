<?php

    // FRONTEND
    include('../functions/functions.edit_profile.php');
	if(isset ($NOTIFY_USER)){
		alertBox('Notice', 'Your profile has been updated successfully.');
	}
    drawEditProfile($options,$data);


?>

