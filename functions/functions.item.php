<?php
    
    /** Draws a sign in button.
     *
     * @param string $text display text. use either 'Sign In' or 'Sign In to Purchase'
     * @return void draws to page
     */
    function drawSignInButton($text, $format){
        $url = signInNavigation();
        drawLinkButton($text, $url, $format);
        return;
    }

    
    /** draws an add to cart button 
     *
     * @param  mixed $id item id for sql insert
     * @param  mixed $format format for button from contants.all.php
     * @param  mixed $command command for api from constants.all.php
     * @return void draws to page
     */
    function drawAddToCartButton($id, $format, $command){
        $text = 'Add to Cart';
        $url = itemAPI($id, $command);
        drawLinkButton($text, $url, $format);
        return;
    }

    
    /** draws the edit item button
     *
     * @param  mixed $id item id
     * @param  mixed $format button format
     * @param  mixed $command
     * @return void draws to page
    */
    function drawEditItemButton($id, $format, $command){
        $text = 'Edit Item';
        $url = itemAPI($id, $command);
        drawLinkButton($text, $url, $format); 
    }

    
    /** draws edit item modal
     *
     * @return void draws to page
     */
    function drawEditItemModal(){
        console('draw edit item modal');
    }

?>