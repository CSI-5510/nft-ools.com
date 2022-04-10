<?php

$isAdmin = User::isAdmin();

if ($isAdmin) {

    $result = Admin::getAllNonReviewedItems();

} else {
    header("Location: ../index");
}

?>