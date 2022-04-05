<?php

    if(isset($_POST['image'])){
        // $image = imageSrc($POST['image']);
        $data = array(
            "name"=> 'test name',
            "id"=> '1234',
            "image" => $_POST['image']
        );
    }

?>