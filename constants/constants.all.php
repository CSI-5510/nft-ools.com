<?php


    // ADMIN CONTROLS
	DEFINE("REVIEW",'review');

    
    // NAVIGATION
    define("PROJECT_ROOT",$GLOBALS['config']['url_root']);
    define("URL_LOC_0",$GLOBALS['url_loc'][0]);
    define("URL_LOC_1",$GLOBALS['url_loc'][1]);
    define("URL_LOC_2",$GLOBALS['url_loc'][2]);
    define("ADD_TO_CART","add_to_cart");
    define("REMOVE_FROM_CART","remove_from_cart");
    define("EDIT","edit");
    define("ADD_ITEM","add_item");
    define("ADD_ITEM_CONFIRMATION","add_item_confirmation");
    define("CANCEL_ADD_ITEM","cancel_add_item");


    // FORMATTING
    define("BLUE_BUTTON","bg-gray-800 rounded-lg text-gray-100 font-bold text-text-center p-4 m-4 transition duration-300 ease-in-out hover:bg-gray-600");
    define("LISTING_LABEL","p-4 m-10 ml-40 mr-5 w-2/5 bg-gray-300 text-2xl font-bold text-center");
    define("CONFIRMATION_LABEL","p-4 m-10 ml-5 mr-40 w-3/5 bg-blue-200 border-2");
    define("LISTING_INPUT_AREA","p-4 m-10 ml-5 mr-40 w-3/5 bg-white border-2 border-gray-800 text-center");
    define("LISTING_DROPZONE","p-4 m-10 ml-5 mr-40 w-3/5 bg-blue-200 border-2 border-blue-800 hover:bg-blue-400 text-center");
    define("LISTING_AFFIDAVIT_CONTAINER","");
    define("LISTING_PRICE_LABEL","p-4 m-10 ml-5 mr-40 w-3/5 bg-gray-300");
    define("FLEX_ROW_NO_JUSTIFY","flex flex-row items-start");
    define("FLEX_ROW_JUSTIFY","flex flex-row justify-between items-start");
    define("CONFIRMATION_IMAGE","p-4 m-10 ml-5 mr-40 w-3/5");

    // ASIDE CONTROL ELEMENT FORMATTING
    // AC[X]_CLASS_[DESCRIPTOR]
    define("AC2_CLASS_ANY","ml-3 h-10 px-3 py-2 rounded-lg text-gray-500 bg-gray-800 hover:bg-gray-100");
    define("AC3_CLASS_REGISTER","flex flex-row items-center h-10 px-3 rounded-lg text-gray-600 bg-gray-100 hover:bg-gray-100 hover:text-gray-700");
    define("AC3_CLASS_OTHER","flex flex-row items-center h-10 px-3 rounded-lg text-gray-300 hover:bg-gray-100");


    // ACCEPTED FILE TYPES
    define("ACCEPTED_IMAGE_TYPES",".jpg,.jpeg,.png");


    
    // PRICING
    define("DAYS_TO_MINIMUM_PIRCE",37);
    define("PRICE_FLOOR",0.1);


    // ADD ITEM POST
    define("ADD_ITEM_TITLE","title");
    define("ADD_ITEM_CATEGORY","category");
    define("ADD_ITEM_DESCRIPTION","description");
    define("ADD_ITEM_IMAGE","image");
    define("ADD_ITEM_DOCUMENTATION","documentation");
    define("ADD_ITEM_RECEIPT","receipt");
    define("ADD_ITEM_ORIGINAL_PURCHASE_DATE","original_purchase_date");
    define("ADD_ITEM_ORIGINAL_PURCHASE_PRICE","original_price");
    define("ADD_ITEM_AFFIDAVIT_NAME","affidavit_name");
    define("ADD_ITEM_AFFIDAVIT_VERIFY","affidavit_verify");
    define("ADD_ITEM_SERIAL_NUMBER","serial");


    // ADD ITEM QUERY
    define("ADD_ITEM_QUERY_NAME", 'i_name');
    define("ADD_ITEM_QUERY_DESCRIPTION", "i_description");
    define("ADD_ITEM_QUERY_CURRENT_PRICE","current_price");
    define("ADD_ITEM_QUERY_IMAGE","i_image");
    define("ADD_ITEM_QUERY_CATEGORY","i_category_Id");
    define("ADD_ITEM_QUERY_SERIAL_NUMBER","i_serialnum");
    define("ADD_ITEM_QUERY_ORIGINAL_PURCHASE_PRICE","original_price");
    define("ADD_ITEM_QUERY_ORIGINAL_PURCHASE_DATE","original_purchase_date");
    define("ADD_ITEM_QUERY_DAYS_TO_MINIMUM_PRICE","days_to_minimum_price");




    
?>