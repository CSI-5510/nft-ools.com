<?php

   
    
    /** draws edit profile page
     *
     * @return void draws to page
     */
    function drawEditProfile($data){
        
        // CONSTANTS
        $OPEN_ROW = '<div class="'.FLEX_ROW_JUSTIFY.'">';
        $CLOSE_ROW = '</div>';
        $url = generalNavigation(array(COLLECTOR, EDIT_PROFILE));

		return 

            // OPEN FORM
            '<form method="POST" action="'.$url.'" enctype="multipart/form-data">'.
            
            // ROW USERNAME
            $OPEN_ROW.
            drawLabel('UserName', LISTING_LABEL).
            drawTextInput(USER_TABLE_USERNAME, LISTING_INPUT_AREA, 20, TRUE, $data[USER_TABLE_USERNAME]).
            $CLOSE_ROW.
            
            // ROW EMAIL
            $OPEN_ROW.
            drawLabel('Email', LISTING_LABEL).
            drawTextInput(USER_TABLE_EMAIL, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_EMAIL]).
            $CLOSE_ROW.
            
            // ROW PASSWORD
            //  $OPEN_ROW.
            // drawLabel('Password', LISTING_LABEL).
            // drawTextInput(USER_TABLE_PASSWORD, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_PASSWORD]).
            //  $CLOSE_ROW.

            // ROW FIRST NAME
            $OPEN_ROW.
            drawLabel('First Name', LISTING_LABEL).
            drawTextInput(USER_TABLE_FIRST_NAME, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_FIRST_NAME]).
            $CLOSE_ROW.
            
            // ROW LAST NAME
            $OPEN_ROW.
            drawLabel('Last Name', LISTING_LABEL).
            drawTextInput(USER_TABLE_LAST_NAME, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_LAST_NAME]).
            $CLOSE_ROW.
            
            // ROW ADDRESS LINE 1
            $OPEN_ROW.
            drawLabel('Address Line 1', LISTING_LABEL).
            drawTextInput(USER_TABLE_ADDR_LINE_1, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_ADDR_LINE_1]).
            $CLOSE_ROW.
            
            // ROW ADDRESS LINE 2
            $OPEN_ROW.
            drawLabel('Address Line 2', LISTING_LABEL).
            drawTextInput(USER_TABLE_ADDR_LINE_2, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_ADDR_LINE_2]).
            $CLOSE_ROW.
            
            // ROW CITY
            $OPEN_ROW.
            drawLabel('City', LISTING_LABEL).
            drawTextInput(USER_TABLE_CITY, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_CITY]).
            $CLOSE_ROW.
            
            // ROW STATE
            $OPEN_ROW.
            drawLabel('State', LISTING_LABEL).
            drawTextInput(USER_TABLE_STATE, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_STATE]).
            $CLOSE_ROW.
            
            // ROW ZIP CODE
            $OPEN_ROW.
            drawLabel('Zip Code', LISTING_LABEL).
            drawTextInput(USER_TABLE_ZIP, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_ZIP]).
            $CLOSE_ROW.
            
            // ROW PHONE NUMBER
            $OPEN_ROW.
            drawLabel('Phone Number', LISTING_LABEL).
            drawTextInput(USER_TABLE_PHONE, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_PHONE]).
            $CLOSE_ROW.
            
            // ROW SUBMIT BUTTON
            $OPEN_ROW.
            drawSubmitButton(BLUE_BUTTON." mx-40 my-10 w-full").
            $CLOSE_ROW.
            
            // CLOSE FORM
            '</form>';
        
    }


    /** draws edit profile page
     *
     * @return void draws to page
     */
    function drawProfile($data){
        
        
        // CONSTANTS
        $OPEN_ROW = '<div class="'.FLEX_ROW_JUSTIFY.'">';
        $CLOSE_ROW = '</div>';
        $url = generalNavigation(array(URL_PROFILE, EDIT_PROFILE));
        
        return 
            // ROW USERNAME
            $OPEN_ROW.
            drawLabel('UserName', LISTING_LABEL).
            drawLabel($data[USER_TABLE_USERNAME], LISTING_LABEL).
            $CLOSE_ROW.
            
            // ROW EMAIL
            $OPEN_ROW.
            drawLabel('Email', LISTING_LABEL).
            drawLabel($data[USER_TABLE_EMAIL], LISTING_LABEL).
            $CLOSE_ROW.
            
            // ROW PASSWORD
            //  $OPEN_ROW.
            // drawLabel('Password', LISTING_LABEL).
            // drawTextInput(USER_TABLE_PASSWORD, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_PASSWORD]).
            //  $CLOSE_ROW.

            // ROW FIRST NAME
            $OPEN_ROW.
            drawLabel('First Name', LISTING_LABEL).
            drawLabel($data[USER_TABLE_FIRST_NAME], LISTING_LABEL).
            $CLOSE_ROW.
            
            // ROW LAST NAME
            $OPEN_ROW.
            drawLabel('Last Name', LISTING_LABEL).
            drawLabel($data[USER_TABLE_LAST_NAME], LISTING_LABEL).
            $CLOSE_ROW.
            
            // ROW ADDRESS LINE 1
            $OPEN_ROW.
            drawLabel('Address Line 1', LISTING_LABEL).
            drawLabel($data[USER_TABLE_ADDR_LINE_1], LISTING_LABEL).
            $CLOSE_ROW.
            
            // ROW ADDRESS LINE 2
            $OPEN_ROW.
            drawLabel('Address Line 2', LISTING_LABEL).
            drawLabel($data[USER_TABLE_ADDR_LINE_2], LISTING_LABEL).
            $CLOSE_ROW.
            
            // ROW CITY
            $OPEN_ROW.
            drawLabel('City', LISTING_LABEL).
            drawLabel($data[USER_TABLE_CITY], LISTING_LABEL).
            $CLOSE_ROW.
            
            // ROW STATE
            $OPEN_ROW.
            drawLabel('State', LISTING_LABEL).
            drawLabel($data[USER_TABLE_STATE], LISTING_LABEL).
            $CLOSE_ROW.
            
            // ROW ZIP CODE
            $OPEN_ROW.
            drawLabel('Zip Code', LISTING_LABEL).
            drawLabel($data[USER_TABLE_ZIP], LISTING_LABEL).
            $CLOSE_ROW.
            
            // ROW PHONE NUMBER
            $OPEN_ROW.
            drawLabel('Phone Number', LISTING_LABEL).
            drawLabel($data[USER_TABLE_PHONE], LISTING_LABEL).
            $CLOSE_ROW.
            
            // ROW SUBMIT BUTTON
            $OPEN_ROW.
            drawLinkButton('Edit Profile', $url, BLUE_BUTTON." mx-40 my-10 w-full").
            $CLOSE_ROW
        ;
        
    }

?>