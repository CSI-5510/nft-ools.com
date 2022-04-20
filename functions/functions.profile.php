<?php

    
    /** draws edit profile page
     *
     * @return void draws to page
     */
    function drawEditProfile($data){
        
        // CONSTANTS
        $OPEN_ROW = '<div class="'.FLEX_ROW_JUSTIFY.'">';
        $CLOSE_ROW = '</div>';
        $url = generalNavigation(array(URL_COLLECTOR, URL_EDIT_PROFILE));

		return 

            // REQUIRED FIELDS MESSAGE
            $OPEN_ROW.
            drawLabel('fields marked with * are required', REQUIRED_FIELDS_MESSAGE).
            $CLOSE_ROW.

            // OPEN FORM
            '<form method="POST" action="'.$url.'" enctype="multipart/form-data">'.
            
            // ROW USERNAME
            $OPEN_ROW.
            drawLabel('<p>UserName *</p><p class="'.REQUIRED_FIELD_NOTE.'"> 45 characters max</p>', LABEL_LEFT).
            drawTextInput(USER_TABLE_USERNAME, LISTING_INPUT_AREA, 45, false, $data[USER_TABLE_USERNAME]).
            $CLOSE_ROW.
            
            // ROW EMAIL
            $OPEN_ROW.
            drawLabel('<p>Email *</p><p class="'.REQUIRED_FIELD_NOTE.'"> 45 characters max, must follow valid email formatting</p>', LABEL_LEFT).
            drawEmailInput(USER_TABLE_EMAIL, LISTING_INPUT_AREA, 45, false,$data[USER_TABLE_EMAIL]).
            $CLOSE_ROW.
            
            // ROW PASSWORD
            //  $OPEN_ROW.
            // drawLabel('Password', LABEL_LEFT).
            // drawTextInput(USER_TABLE_PASSWORD, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_PASSWORD]).
            //  $CLOSE_ROW.

            // ROW FIRST NAME
            $OPEN_ROW.
            drawLabel('<p>First Name *</p><p class="'.REQUIRED_FIELD_NOTE.'">45 characters max</p>', LABEL_LEFT).
            drawTextInput(USER_TABLE_FIRST_NAME, LISTING_INPUT_AREA, 45, false,$data[USER_TABLE_FIRST_NAME]).
            $CLOSE_ROW.
            
            // ROW LAST NAME
            $OPEN_ROW.
            drawLabel('<p>Last Name *</p><p class="'.REQUIRED_FIELD_NOTE.'">45 characters max</p>', LABEL_LEFT).
            drawTextInput(USER_TABLE_LAST_NAME, LISTING_INPUT_AREA, 45, false,$data[USER_TABLE_LAST_NAME]).
            $CLOSE_ROW.
            
            // ROW ADDRESS LINE 1
            $OPEN_ROW.
            drawLabel('<p>Address Line 1 *</p><p class="'.REQUIRED_FIELD_NOTE.'">200 characters max</p>', LABEL_LEFT).
            drawTextInput(USER_TABLE_ADDR_LINE_1, LISTING_INPUT_AREA, 200, false,$data[USER_TABLE_ADDR_LINE_1]).
            $CLOSE_ROW.
            
            // ROW ADDRESS LINE 2
            $OPEN_ROW.
            drawLabel('<p>Address Line 2 *</p><p class="'.REQUIRED_FIELD_NOTE.'">45 characters max</p>', LABEL_LEFT).
            drawTextInput(USER_TABLE_ADDR_LINE_2, LISTING_INPUT_AREA, 45, false,$data[USER_TABLE_ADDR_LINE_2]).
            $CLOSE_ROW.
            
            // ROW CITY
            $OPEN_ROW.
            drawLabel('<p>City *</p><p class="'.REQUIRED_FIELD_NOTE.'">45 characters max</p>', LABEL_LEFT).
            drawTextInput(USER_TABLE_CITY, LISTING_INPUT_AREA, 45, false,$data[USER_TABLE_CITY]).
            $CLOSE_ROW.
            
            // ROW STATE
            $OPEN_ROW.
            drawLabel('<p>State *</p><p class="'.REQUIRED_FIELD_NOTE.'">45 characters max</p>', LABEL_LEFT).
            drawTextInput(USER_TABLE_STATE, LISTING_INPUT_AREA, 45, false,$data[USER_TABLE_STATE]).
            $CLOSE_ROW.
            
            // ROW ZIP CODE
            $OPEN_ROW.
            drawLabel('<p>ZIP Code *</p><p class="'.REQUIRED_FIELD_NOTE.'">5 numbers</p>', LABEL_LEFT).
            drawZipInput(USER_TABLE_ZIP, LISTING_INPUT_AREA, false, $data[USER_TABLE_ZIP]).
            $CLOSE_ROW.
            
            // ROW PHONE NUMBER
            $OPEN_ROW.
            drawLabel('<p>Phone Number *</p><p class="'.REQUIRED_FIELD_NOTE.'">10 digits, no delimeters</p>', LABEL_LEFT).
            drawPhoneInput(USER_TABLE_PHONE, LISTING_INPUT_AREA, false, $data[USER_TABLE_PHONE]).
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
        $url = generalNavigation(array(URL_PROFILE, URL_EDIT_PROFILE));
        
        return 
            // ROW USERNAME
            $OPEN_ROW.
            drawLabel('UserName', LABEL_LEFT).
            drawLabel($data[USER_TABLE_USERNAME], LABEL_RIGHT).
            $CLOSE_ROW.
            
            // ROW EMAIL
            $OPEN_ROW.
            drawLabel('Email', LABEL_LEFT).
            drawLabel($data[USER_TABLE_EMAIL], LABEL_RIGHT).
            $CLOSE_ROW.
            
            // ROW PASSWORD
            //  $OPEN_ROW.
            // drawLabel('Password', LABEL_LEFT).
            // drawTextInput(USER_TABLE_PASSWORD, LISTING_INPUT_AREA, 20, TRUE,$data[USER_TABLE_PASSWORD]).
            //  $CLOSE_ROW.

            // ROW FIRST NAME
            $OPEN_ROW.
            drawLabel('First Name', LABEL_LEFT).
            drawLabel($data[USER_TABLE_FIRST_NAME], LABEL_RIGHT).
            $CLOSE_ROW.
            
            // ROW LAST NAME
            $OPEN_ROW.
            drawLabel('Last Name', LABEL_LEFT).
            drawLabel($data[USER_TABLE_LAST_NAME], LABEL_RIGHT).
            $CLOSE_ROW.
            
            // ROW ADDRESS LINE 1
            $OPEN_ROW.
            drawLabel('Address Line 1', LABEL_LEFT).
            drawLabel($data[USER_TABLE_ADDR_LINE_1], LABEL_RIGHT).
            $CLOSE_ROW.
            
            // ROW ADDRESS LINE 2
            $OPEN_ROW.
            drawLabel('Address Line 2', LABEL_LEFT).
            drawLabel($data[USER_TABLE_ADDR_LINE_2], LABEL_RIGHT).
            $CLOSE_ROW.
            
            // ROW CITY
            $OPEN_ROW.
            drawLabel('City', LABEL_LEFT).
            drawLabel($data[USER_TABLE_CITY], LABEL_RIGHT).
            $CLOSE_ROW.
            
            // ROW STATE
            $OPEN_ROW.
            drawLabel('State', LABEL_LEFT).
            drawLabel($data[USER_TABLE_STATE], LABEL_RIGHT).
            $CLOSE_ROW.
            
            // ROW ZIP CODE
            $OPEN_ROW.
            drawLabel('Zip Code', LABEL_LEFT).
            drawLabel($data[USER_TABLE_ZIP], LABEL_RIGHT).
            $CLOSE_ROW.
            
            // ROW PHONE NUMBER
            $OPEN_ROW.
            drawLabel('Phone Number', LABEL_LEFT).
            drawLabel($data[USER_TABLE_PHONE], LABEL_RIGHT).
            $CLOSE_ROW.
            
            // ROW SUBMIT BUTTON
            $OPEN_ROW.
            drawLinkButton('Edit Profile', $url, BLUE_BUTTON." mx-40 my-10 w-full text-center").
            $CLOSE_ROW
        ;
        
    }

?>