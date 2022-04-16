<?php


    function drawAddEventPage($id){

        // CONSTANTS
        $OPEN_ROW = '<div class="'.FLEX_ROW_JUSTIFY.'">';
        $CLOSE_ROW = '</div>';
        
        // OPEN FORM
        echo '<form method="POST" action="./'.COLLECTOR.'/'.URL_ADD_EVENT.'" enctype="multipart/form-data">';
        
        // EVENT TYPE
        echo $OPEN_ROW;
        echo drawLabel('EVENT TYPE', LISTING_LABEL);
        $options = array(
            array("value" => 'REPAIR', "text" => "REPAIR"),
            array("value" => 'UPGRADE', "text" => "UPGRADE")
        );
        echo drawSelectOption(ADD_EVENT_TYPE, LISTING_INPUT_AREA, $options);
        echo $CLOSE_ROW;
        
        // EVENT DATE
        echo $OPEN_ROW;
        echo drawLabel('DATE', LISTING_LABEL);
        echo drawDateInput(ADD_EVENT_DATE, LISTING_INPUT_AREA);
        echo $CLOSE_ROW;
        
        // EVENT COST
        echo $OPEN_ROW;
        echo drawLabel('COST', LISTING_LABEL);
        echo drawTextInput(ADD_EVENT_COST, LISTING_INPUT_AREA, 20, TRUE, '');
        echo $CLOSE_ROW;
        
        // EVENT DESCRIPTION
        echo $OPEN_ROW;
        echo drawLabel('DESCRIPTION', LISTING_LABEL);
        echo drawTextArea(ADD_EVENT_DESCRIPTION, LISTING_INPUT_AREA, 200, TRUE);
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