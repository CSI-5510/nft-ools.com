<?php

    $data = getCategoryTiles();
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

    function itemTileQuery($cat_ID, $button){
        //  return DatabaseConnector::getCategoryTiles();
    }


    function getCategoryTiles(){
        return DatabaseConnector::getCategoryTiles();
    }




    function printItemTile($data){
        echo "
        <form method='POST'>
      </div>
            <div class='flex w-64 h-64 p-0 m-0 bg-gray-200' onclick='testFunction();'>
            <img class='bg-fixed' src='data:image/jpeg;base64,".base64_encode($data['i_image'])."'> </img>
                </div>
                <input type='hidden' name='category' value='1' />
                <input type='text' name='fawew' value='yeet'/>
                    <input type='submit'/>

            </form>
        ";
    }

    

?>