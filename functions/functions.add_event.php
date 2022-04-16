<?php


    function drawAddEventPage($id){

        // CONSTANTS
        $OPEN_ROW = '<div class="'.FLEX_ROW_JUSTIFY.'">';
        $CLOSE_ROW = '</div>';
        
        // OPEN FORM
        echo '<form method="POST" action="'.PROJECT_ROOT.'/'.URL_LOC_0.'/'.COLLECTOR.'/'.URL_ADD_EVENT.'" enctype="multipart/form-data">';
        
        // ITEM ID
        echo drawHidden(EVENT_TABLE_ITEM_ID,$id);

        // EVENT TYPE
        echo $OPEN_ROW;
        echo drawLabel('EVENT TYPE', LISTING_LABEL);
        $options = array(
            array("value" => EVENT_SAVED_REPAIRED, "text" => EVENT_SAVED_REPAIRED),
            array("value" => EVENT_SAVED_UPGRADED, "text" => EVENT_SAVED_UPGRADED)
        );
        echo drawSelectOption(EVENT_TABLE_DESCRIPTION_EVENT_TYPE, LISTING_INPUT_AREA, $options);
        echo $CLOSE_ROW;
        
        // EVENT DATE
        echo $OPEN_ROW;
        echo drawLabel('DATE', LISTING_LABEL);
        echo drawDateInput(EVENT_TABLE_DESCRIPTION_DATE, LISTING_INPUT_AREA);
        echo $CLOSE_ROW;
        
        // EVENT COST
        echo $OPEN_ROW;
        echo drawLabel('COST', LISTING_LABEL);
        echo drawTextInput(EVENT_TABLE_DESCRIPTION_COST, LISTING_INPUT_AREA, 20, TRUE, '');
        echo $CLOSE_ROW;
        
        // EVENT DESCRIPTION
        echo $OPEN_ROW;
        echo drawLabel('DESCRIPTION', LISTING_LABEL);
        echo drawTextArea(EVENT_TABLE_DESCRIPTION_CUSTOM_DESCRIPTION, LISTING_INPUT_AREA, 200, TRUE);
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