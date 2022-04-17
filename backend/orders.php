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

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

function getUrl($protocol){
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
return $url;
}

/*
getUrl()
http://localhost/nft/public_html/orders?checkout=id?action=boolean

<?php echo "".getUrl()."?checkout=#?cancel=true"; ?>
<?php echo "".getUrl()."?checkout=#?ipn_listener=paypal"; ?>
<?php echo "".getUrl()."?checkout=#?success=true"; ?>
*/


//testmode enables sandbox
$testmode = true;
$paypalurl = $testmode ? 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr' : 'https://ipnpb.paypal.com/cgi-bin/webscr';
$cancelurl = "".getUrl($protocol)."?checkout=#?cancel=true";
$ipnurl = "https://imperfectaimers.net/public_html/listener";
$successurl = "".getUrl($protocol)."?checkout=#?success=true";


/* if(isset($_POST["placeorder"]) || isset($_POST["paypal"])){

    $data = array(
        'cmd'			=> '_cart',
        'upload'        => '1',
        'lc'			=> 'EN',
        'business' 		=> 'sb-t2ex4315255070@business.example.com',
        'cancel_return'	=> ''.$cancelurl.'',
        'notify_url'	=> 'https://imperfectaimers.net/public_html/listener',
        'currency_code'	=> 'USD',
        'return'        => ''.$successurl.'',
    );
	
	$cartOrders = Order::getOrderDetails($_POST["itemid"]);
	
    for ($i = 0; $i < count($cartOrders); $i++) {
		//order_id
        $data['item_number_' . ($i+1)] = $cartOrders[$i]['o_id'];
		//item name
        $data['item_name_' . ($i+1)] = $cartOrders[$i]['i_name'];
		//current price
        $data['amount_' . ($i+1)] = $cartOrders[$i]['current_price'];
    }
	
	header('location:' . $paypalurl . '?' . http_build_query($data));
    // End script
    exit;
	}
	
 */
if($_SERVER['REQUEST_METHOD'] == "GET"){
	if (isset($_GET['ipn_listener']) && $_GET['ipn_listener'] == 'paypal') {
    // Get all input variables and convert them all to URL string variables
    $raw_data = file_get_contents('php://input');
    $raw_array = explode('&', $raw_data);
    $myPost = [];
	
	
	
	}
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