<?php

   
    
    /** draws edit profile page
     *
     * @return void draws to page
     */
    function drawEditProfile($options,$data){

        // CONSTANTS
        $OPEN_ROW = '<div class="'.FLEX_ROW_JUSTIFY.'">';
        $CLOSE_ROW = '</div>';
        
		
        // OPEN FORM
        echo '<form method="POST" action="./'.COLLECTOR.'/'.EDIT_PROFILE.'" enctype="multipart/form-data">';
        
        // ROW USERNAME
        echo $OPEN_ROW;
        drawLabel('UserName', LISTING_LABEL);
        drawTextInput(USER_TABLE_USERNAME, LISTING_INPUT_AREA, 20, TRUE, $data[USER_TABLE_USERNAME]);
        echo $CLOSE_ROW;
        
        // ROW EMAIL
        echo $OPEN_ROW;
        drawLabel('Email', LISTING_LABEL);
        drawTextInput(USER_TABLE_EMAIL, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_EMAIL]);
        echo $CLOSE_ROW;
        
        // ROW PASSWORD
        echo $OPEN_ROW;
        drawLabel('Password', LISTING_LABEL);
        drawTextInput(USER_TABLE_PASSWORD, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_PASSWORD]);
        echo $CLOSE_ROW;

        // ROW FIRST NAME
        echo $OPEN_ROW;
        drawLabel('First Name', LISTING_LABEL);
        drawTextInput(USER_TABLE_FNAME, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_FNAME]);
        echo $CLOSE_ROW;
        
        // ROW LAST NAME
        echo $OPEN_ROW;
        drawLabel('Last Name', LISTING_LABEL);
        drawTextInput(USER_TABLE_LNAME, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_LNAME]);
        echo $CLOSE_ROW;
        
        // ROW ADDRESS LINE 1
        echo $OPEN_ROW;
        drawLabel('Address Line 1', LISTING_LABEL);
        drawTextInput(USER_TABLE_ADDR_LINE_1, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_ADDR_LINE_1]);
        echo $CLOSE_ROW;
        
        // ROW ADDRESS LINE 2
        echo $OPEN_ROW;
        drawLabel('Address Line 2', LISTING_LABEL);
        drawTextInput(USER_TABLE_ADDR_LINE_2, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_ADDR_LINE_2]);
        echo $CLOSE_ROW;
        
        // ROW CITY
        echo $OPEN_ROW;
        drawLabel('City', LISTING_LABEL);
        drawTextInput(USER_TABLE_CITY, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_CITY]);
        echo $CLOSE_ROW;
        
        // ROW STATE
        echo $OPEN_ROW;
        drawLabel('State', LISTING_LABEL);
        drawTextInput(USER_TABLE_STATE, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_STATE]);
        echo $CLOSE_ROW;
        
        // ROW ZIP CODE
        echo $OPEN_ROW;
        drawLabel('Zip Code', LISTING_LABEL);
        drawTextInput(USER_TABLE_ZIP, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_ZIP]);
        echo $CLOSE_ROW;
		
		// ROW PHONE NUMBER
        echo $OPEN_ROW;
        drawLabel('Phone Number', LISTING_LABEL);
        drawTextInput(USER_TABLE_PHONE, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_PHONE]);
        echo $CLOSE_ROW;
		
        // ROW SUBMIT BUTTON
        echo $OPEN_ROW;
        drawSubmitButton(BLUE_BUTTON." mx-40 my-10 w-full");
        echo $CLOSE_ROW;
        
        // CLOSE FORM
        echo '</form>';

        return;
        
    }

?>