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
     * @param  string $id item id for sql insert
     * @return void draws to page
     */
    function drawAddToCartButton($id, $format){
        $text = 'Add to Cart';
        $url = addToCartNavigation($id);
        drawLinkButton($text, $url, $format);
        return;
    }

?>