<?php 
    
    try{
        switch($GLOBALS['url_loc'][2]){
            case $REMOVE_FROM_CART:
				//is item already in the users cart? let the user know
				if(!$is_item_in_cart){
                alertBox("Item is not in orders", "Error");
				} else {
				//set $is_item_in_cart to true
				$is_item_in_cart = false;					
				//initial add to order
                alertBox($item_data['i_name'], "Removed from orders");
				}
                break;		
            default:
                break;
        }
    } catch(Exception $e){
        alertBox('malformed url');
    }
?>
<div class="bg-white p-8 rounded-md w-full">
<?php foreach($buyingorders AS $result):?>

<?php $cartOrders = Order::getOrderDetails($result["o_item_id"]); ?>
		<div>
			<h2 class="text-gray-600 font-semibold">Your items</h2>
			<span class="text-xs">As a buyer</span>
		</div>
		<div>
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Item
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Seller
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Price
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Status
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Action
								</th>								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
								<a href="<?php echo $GLOBALS['config']['url_root'];echo"/";echo $GLOBALS["url_loc"][0]; ?>/item/<?php echo $result["o_item_id"]?>">
									<div class="flex items-center">
										
										<div class="flex-shrink-0 w-10 h-10">
											<img class="w-full h-full rounded-full"
                                                src="<?php echo imgConvert($result["i_image"])?>"
                                                alt="" />
                                        </div>
											<div class="ml-3">
												<p class="text-gray-900 whitespace-no-wrap">
													<?php echo $result["i_name"];?>
												</p>
											</div>
										</div>
										</a>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap"><?php echo $result["o_seller_id"];?></p>
								</td>

								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
										<?php echo "$11";?>
									</p>
								</td>
								<td class="px-5 py-5 border-b text-center border-gray-200 bg-white text-sm">
									<span
                                        class="relative inline-block px-3 py-1 font-semibold text-<?php echo $result["o_status"]==="pending" ? "yellow": (($result["o_status"]==="fulfilled") ? "gray":"gray"); ?>-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-<?php echo $result["o_status"]==="pending" ? "yellow": (($result["o_status"]==="fulfilled") ? "green":"gray"); ?>-200 opacity-50 rounded-full"></span>
									<span class="relative"><?php echo ucwords($result["o_status"]);?></span>
									</span>
								</td>
								<td class="px-5 py-5 text-center border-b border-gray-200 bg-white text-sm">
								<?php if($result["o_status"]==="pending"): ?>
								<div class="flex flex-row items-center mx-auto justify-center text-center space-x-2">
								<div><a href="./orders/remove_from_cart/<?php echo $result["o_item_id"]; ?>"><div class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Remove</div></a>
								</div>
								<div>
								<form method="post" action="https://ipnpb.sandbox.paypal.com/cgi-bin/webscr">
								  <input name="cmd" type="hidden" value="_cart"></input> 
								  <input name="upload" type="hidden" value="1"></input> 
								  <input name="lc" type="hidden" value="EN"></input> 
								  <input name="business" type="hidden" value="sb-t2ex4315255070@business.example.com"></input> 
								  <input name="cancel_return" type="hidden" value="<?php echo $cancelurl; ?>"></input> 
								  <input name="notify_url" type="hidden" value="https://imperfectaimers.net/public_html/listener"></input> 
								  <input name="currency_code" type="hidden" value="USD"></input> 
								  <input name="return" type="hidden" value="<?php echo $successurl;?>"></input>
								  <input name="item_number_1" type="hidden" value="<?php echo $cartOrders[0]['o_id']; ?>"></input>  
								  <input name="item_name_1" type="hidden" value="<?php echo $cartOrders[0]['i_name']; ?>"></input>  
								  <input name="amount_1" type="hidden" value="<?php echo $cartOrders[0]['current_price']; ?>"></input>  
								<input type="submit" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer" value="Checkout"></input>
								</form>
								</div>
</div>
								<?php endif;?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>