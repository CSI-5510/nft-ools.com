<?php

// CONSTANTS
$OPEN_ROW = '<div class="'.FLEX_ROW_JUSTIFY.'">';
$CLOSE_ROW = '</div>';


// ROW TITLE
echo $OPEN_ROW;
echo drawLabel('name', LABEL_LEFT);
echo drawTextInput(ITEM_OBFUSCATED_NAME, LISTING_INPUT_AREA, 20, TRUE);
echo $CLOSE_ROW;


?>