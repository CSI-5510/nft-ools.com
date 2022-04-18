<?php


    function drawAddEventPage($id){

        // CONSTANTS
        $OPEN_ROW = '<div class="'.FLEX_ROW_JUSTIFY.'">';
        $CLOSE_ROW = '</div>';
        $url = generalNavigation(array(URL_COLLECTOR, URL_ADD_EVENT, $id));


        // OPEN FORM
        echo '<form method="POST" action="'.$url.'" enctype="multipart/form-data">';
        
        // ITEM ID
        echo drawHidden(ORDER_TABLE_ITEM_ID,$id);

        // EVENT TYPE
        echo $OPEN_ROW;
        echo drawLabel('EVENT TYPE', LABEL_LEFT);
        $options = array(
            array("value" => EVENT_SAVED_REPAIRED, "text" => EVENT_SAVED_REPAIRED),
            array("value" => EVENT_SAVED_UPGRADED, "text" => EVENT_SAVED_UPGRADED)
        );
        echo drawSelectOption(EVENT_TABLE_TYPE, LISTING_INPUT_AREA, $options, '');
        echo $CLOSE_ROW;
        
        // EVENT DATE
        echo $OPEN_ROW;
        echo drawLabel('DATE', LABEL_LEFT);
        echo drawDateInput(EVENT_TABLE_DATE, LISTING_INPUT_AREA, TRUE, date('Y-m-d'));
        echo $CLOSE_ROW;
        
        // EVENT COST
        echo $OPEN_ROW;
        echo drawLabel('COST', LABEL_LEFT);
        echo drawTextInput(EVENT_TABLE_COST, LISTING_INPUT_AREA, 20, TRUE, '');
        echo $CLOSE_ROW;
        
        // EVENT DESCRIPTION
        echo $OPEN_ROW;
        echo drawLabel('DESCRIPTION', LABEL_LEFT);
        echo drawTextArea(EVENT_TABLE_DESCRIPTION, LISTING_INPUT_AREA, 200, TRUE);
        echo $CLOSE_ROW;  
        
        // ROW SUBMIT BUTTON
        echo $OPEN_ROW;
        echo drawSubmitButton(BLUE_BUTTON." mx-40 my-10 w-full");
        echo $CLOSE_ROW;
        
        // CLOSE FORM
        echo '</form>';

        return;
        
    }


?>