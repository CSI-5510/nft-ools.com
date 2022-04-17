<?php 

    /*
        $GLOBALS['url_loc'][0] <-- 'public_html'
        $GLOBALS['url_loc'][1] <-- 'orders'
        $GLOBALS['url_loc'][2] <-- operation as string
        $GLOBALS['url_loc'][3] <-- item id as string
    */
	
$signed_in = User::isLoggedin();
$buyingorders = Order::getUsersOrdersAsBuyer();

function imgConvert($blob){
return 'data:image/jpeg;base64,'.base64_encode($blob);
}

//if id is specified after operation as string is given
if($GLOBALS['url_loc'][2]){
	    try{
        switch($GLOBALS['url_loc'][2]){
            case "remove_from_cart":
                Order::removeItemFromCart($GLOBALS['url_loc'][3], $signed_in);
                break;
			default:
			//returns them back to the default item page
				header("location:./");
				break;
        }
    } catch(Exception $e) {
        $result = $e->getMessage();
    }
}




?>