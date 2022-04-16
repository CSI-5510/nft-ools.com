<?php

    include_once('../functions/functions.ui.php');
    include_once('../functions/functions.edit_profile.php');
    alertBox('Profile successfully updated.', 'Notification');
    drawEditProfile($user_data);

?>