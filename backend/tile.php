<?php


    function mapCategoryToTile($data){
        return [
            "name"=> $data['cat_name'],
            "id"=> $data['cat_id'],
            "image"=> $data['i_image']
        ];
    }


    function mapItemToTile($data){
        return [
            "name"=> $data['i_name'],
            "id"=> $data['i_id'],
            "image"=> $data['i_image']
        ];
    }


    function printTile($data){
        echo "
            <div class='w-64 h-64 p-0 m-0 bg-gray-200'>
                <form method='POST'>
                    <input type='text' name='cat_name' value='". $data['name']."' class='w-200 h-20 bottom-0'>
                    <input type='hidden' name='cat_id' value='".$data['id']."' />
                    <input type='image' class='w-full h-full p-0 m-0' name='submit' src='data:image/jpeg;base64,".base64_encode($data['image'])."'/>
                </form>
            </div>
        ";
    }


?>