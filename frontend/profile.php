<?php

    // FRONTEND
    include('../functions/functions.profile.php');
    // console($GLOBALS['user_profile_updated']);
    // if($GLOBALS['user_profile_updated']){
    //     alertBox('Notice', 'Your profile has been updated successfully.');
    // }


    switch(URL_LOC_1){
        case URL_EDIT_PROFILE:
            echo drawEditProfile($user_data);
            break;
        default: 
            echo drawProfile($user_data);
            break;
    }


?>

