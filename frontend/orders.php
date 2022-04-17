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
								<a href="./orders/remove_from_cart/<?php echo $result["o_item_id"] ?>" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Remove</a>
								<?php endif;?>
								<a href="./orders/remove_from_cart/<?php echo $result["o_item_id"] ?>" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">Checkout</a>
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