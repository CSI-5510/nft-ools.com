<?php

    // FRONTEND
    include('../functions/functions.edit_profile.php');
    console($GLOBALS['user_profile_updated']);
    if($GLOBALS['user_profile_updated']){
        alertBox('Notice', 'Your profile has been updated successfully.');
    }
    drawEditProfile($user_data);


?>

