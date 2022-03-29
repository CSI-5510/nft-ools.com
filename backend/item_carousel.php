<?php

    echo 'POST structure:<br>';
    echo var_dump($_POST).'<br><br>';

    if (is_null($_POST['category'])){
        echo 'no category from POST<br>';
        $_SESSION['category'] = null;
        echo 'session category set to null';
    } else {
        echo var_dump($_POST['category']);
    }
    echo '<br><br>';

    if (is_null($_SESSION)){
        echo 'no SESSION';
    } else {
        echo var_dump($_SESSION);
    }
    echo '<br>';


    $data = getCategoryTiles();


    function itemTileQuery($cat_ID, $button){
        //  return DatabaseConnector::getCategoryTiles();
    }


    function getCategoryTiles(){
        return DatabaseConnector::getCategoryTiles();
    }


    function printItemTile($data){
        echo "
            <div class='w-64 h-64 p-0 m-0 bg-gray-200' onclick='testFunction();'>
                <form metod='POST'>
                    <input type='text' name='category' value='". $data['cat_name']."' class='w-200 h-20 bottom-0'>
                    <input type='image' name='submit' src='data:image/jpeg;base64,".base64_encode($data['i_image'])."'/>
                    <input type='submit'/>
                </form>
            </div>
        ";
    }

    

?>