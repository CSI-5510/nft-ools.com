<?php

// CONSTANTS
$OPEN_ROW = '<div class="'.FLEX_ROW_JUSTIFY.'">';
$CLOSE_ROW = '</div>';


// ROW TITLE
echo $OPEN_ROW;
drawLabel('name', LISTING_LABEL);
drawTextInput(ITEM_QUERY_NAME, LISTING_INPUT_AREA, 20, TRUE);
echo $CLOSE_ROW;


?>