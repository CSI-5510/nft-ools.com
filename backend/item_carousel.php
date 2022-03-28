<?php


    function simulateCategories($tile_id){
        switch($button){
            case('000000000'):
                return '
                    {
                        "name": "Hand Tools",
                        "image": "../backend/test_images/hand.png",
                        "price": 0.00,
                        "url": ""
                    }
                ';
                break;
            case('001000000'):
                return '
                    {
                        "name": "Power Tools",
                        "image": "../backend/test_images/power.png",
                        "price": 0.00,
                        "url": ""
                    }
                ';
                break;
            case('002000000'):
                return '
                    {
                        "name": "Lawn Care",
                        "image": "../backend/test_images/lawn.png",
                        "price": 0.00,
                        "url": ""
                    }
                ';
                break;
            case('003000000'):
                return '
                    {
                        "name": "Automotive",
                        "image": "../backend/test_images/automotive.png",
                        "price": 0.00,
                        "url": ""
                    }
                ';
                break;
            case('004000000'):
                return '
                    {
                        "name": "Stationary",
                        "image": "../backend/test_images/stationary.png",
                        "price": 0.00,
                        "url": ""
                    }
                ';
                break;
            case('005000000'):
                return '
                    {
                        "name": "Tools by Trade",
                        "image": "../backend/test_images/trade.png",
                        "price": 0.00,
                        "url": ""
                    }
                ';
                break;
            case('000001000'):
                return '
                    {
                        "name": "Hand Tools Sub 0",
                        "image": "../backend/test_images/trade.png",
                        "price": 0.00,
                        "url": ""
                    }
                ';
                break;
            case('000002000'):
                return '
                    {
                        "name": "Tools by Trade",
                        "image": "../backend/test_images/trade.png",
                        "price": 0.00,
                        "url": ""
                    }
                ';
                break;
            case('000001000'):
                return '
                    {
                        "name": "Tools by Trade",
                        "image": "../backend/test_images/trade.png",
                        "price": 0.00,
                        "url": ""
                    }
                ';
                break;
            case('000001000'):
                return '
                    {
                        "name": "Tools by Trade",
                        "image": "../backend/test_images/trade.png",
                        "price": 0.00,
                        "url": ""
                    }
                ';
                break;

        }
        return;
    }


    function itemTileQuery($cat_ID, $button){
        $tile_id = $cat_ID * 1000 + $button;
        return json_decode(simulateQuery($tile_id);
    }


    function printItemTile($layer, $button){
        $item = itemTileQuery($button);
        echo "
            <div class='w-200 h-200 p-0 m-0 bg-gray-200' onclick='testFunction();'>
                <img class='w-200 h-200 p-0 m-0 object-fill' src='".$item['image']."'>
                <p class='w-200 h-20 bottom-0'>
                    ".$item['name']."
                </p>
            </div>
        ";
    }

    

?>