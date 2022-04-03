<div class="flex flex-row justify-between items-center">
    <div id="item_description" class="p-4 m-10 w-3/5 bg-green-100 text-center">
        <?php echo $item_data["i_description"]; ?>
    </div>
    <div id="item_image" class="p-4 m-10 w-1/5 bg-green-100 text-center">
        <image src="<?php echo imageSrc($item_data["i_image"]); ?>"/>
    </div>
</div>
<div class="flex flex-row justify-between items-center">
    <div id="price" class="p-4 m-10 bg-green-100 text-center">
        <?php echo $item_data["i_price"]; ?>
    </div>
    <div class="flex flex-row justify-between items-center w-3/10">
        <div id="sign_in_button" class="p-4 m-10 bg-green-100 text-center">
            sign in button
        </div>
        <div id="add_to_cart_button" class="p-4 m-10 bg-green-100 text-center">
            add to cart
        </div>
    </div>
</div>
<div id="lineage" class="p-4 m-10 bg-green-100 text-center">
    lineage
</div>