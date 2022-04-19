<?php


    // ADMIN CONTROLS
	DEFINE("REVIEW",'review');


    // USER
    define("USER_ID",User::isLoggedIn());

    
	
if($GLOBALS['config']['url_root'] !== ""){
        $route = "".$GLOBALS['config']['url_root']."/";
        } else {
        $route="";
        }
	
    // NAVIGATION
    define("PROJECT_ROOT",$route);
	echo $route;
    define("URL_LOC_0",$GLOBALS['url_loc'][0]);
    define("URL_LOC_1",$GLOBALS['url_loc'][1]);
    define("URL_LOC_2",$GLOBALS['url_loc'][2]);
    define("URL_LOC_3",$GLOBALS['url_loc'][3]);
    define("URL_LOC_4",$GLOBALS['url_loc'][4]);
    define("URL_HOME","../public_html");
    define("URL_PUBLIC_DIRECTORY","public_html");
    define("URL_ADD_TO_CART","add_to_cart");
    define("URL_REMOVE_FROM_CART","remove_from_cart");
    define("URL_EDIT_ITEM","edit");
    define("URL_ADD_ITEM","add_item");
	define("URL_EDIT_PROFILE","edit_profile");
    define("URL_ADD_ITEM_CONFIRMATION","add_item_confirmation");
    define("URL_CANCEL_ADD_ITEM","cancel_add_item");
    define("URL_COLLECTOR","collector");
    define("URL_PROFILE_UPDATED","profile_updated");
    define("URL_ADD_EVENT",'add_event');
    define("URL_ITEM","item");
    define("URL_USER","user");
    define("URL_CATEGORY","category");
    define("URL_PROFILE","profile");
    define("URL_CAROUSEL","carousel");
    define("URL_ABOUT_US","about_us");
    define("URL_LOGIN","login");
    define("URL_SEARCH","search");
    define("URL_SELL_ITEM","sell_item");
    define("URL_REMOVE_SALE_LISTING","remove_sale_listing");

    // FORMATTING
    define("BLUE_BUTTON","bg-gray-800 rounded-lg text-gray-100 font-bold text-text-center p-4 m-4 transition duration-300 ease-in-out hover:bg-gray-600");
    define("LABEL_LEFT","p-4 mt-5 mb-0 ml-40 mr-5 w-2/5 bg-gray-300 text-2xl font-bold text-center");
    define("LABEL_RIGHT","p-4 mt-5 mb-0 ml-5 mr-40 w-2/5 bg-gray-300 text-xl text-center");
    define("CONFIRMATION_LABEL","p-4 m-10 ml-5 mr-40 w-3/5 bg-blue-200 border-2");
    define("REQUIRED_FIELDS_MESSAGE","p-4 mt-5 mb-0 ml-5 w-full bg-withe text-left");
    define("REQUIRED_FIELD_NOTE","p-1 -mb-5 -mr-5 w-full bg-withe text-left text-xs font-normal text-right");
    define("LISTING_INPUT_AREA","p-4 mt-5 mb-0 ml-5 mr-40 w-3/5 bg-white border-2 border-gray-800 text-center");
    define("DROPDOWN_INPUT","p-4 mt-5 mb-0 ml-5 mr-40 w-3/5 bg-white border-2 border-gray-800 text-center");
    define("LISTING_DROPZONE","p-4 mt-5 mb-0 ml-5 mr-40 w-3/5 bg-blue-200 border-2 border-blue-800 hover:bg-blue-400 text-center");
    define("LISTING_AFFIDAVIT_CONTAINER","");
    define("LISTING_PRICE_LABEL","p-4 mt-5 ml-5 mr-40 w-3/5 bg-gray-300");
    define("FLEX_ROW_NO_JUSTIFY","flex flex-row items-start");
    define("FLEX_ROW_JUSTIFY","flex flex-row justify-between items-start");
    define("CONFIRMATION_IMAGE","p-4 m-10 ml-5 mr-40 w-3/5");
    define("EVENT_LEFT","");
    define("EVENT_RIGHT","");


    // ASIDE CONTROL ELEMENT FORMATTING
    define("ASIDE_DEFAULT_CLASS","ml-3 h-10 px-3 py-2 rounded-lg text-gray-500 bg-gray-800 hover:bg-gray-100");
    define("ASIDE_REGISTER_CLASS","flex flex-row items-center h-10 px-3 rounded-lg text-gray-600 bg-gray-100 hover:bg-gray-100 hover:text-gray-700");
    define("ASIDE_OTHER_CLASS","flex flex-row items-center h-10 px-3 rounded-lg text-gray-300 hover:bg-gray-100");


    // ACCEPTED FILE TYPES
    define("ACCEPTED_IMAGE_TYPES",".jpg,.jpeg,.png");
    define("ACCEPT_PDF",".pdf");


    
    // PRICING
    define("DAYS_TO_MINIMUM_PIRCE",37);
    define("PRICE_FLOOR",0.1);


    // CATEGORY TABLE
    define("CATEGORY_TABLE_ID","cat_id");
    define("CATEGORY_TABLE_NAME","cat_name");
    define("CATEGORY_TABLE_MAJ_CAT_ID","maj_cat_id");
    define("CATEGORY_TABLE_MAJ_CAT_NAME","maj_cat_name");


    // ITEM QUERY KEYS
    define("ITEM_OBFUSCATED_ID","a");    // not currenty used
    define("ITEM_OBFUSCATED_NAME","b");
    define("ITEM_OBFUSCATED_DESCRIPTION", "c");
    define("ITEM_OBFUSCATED_CURRENT_PRICE","d"); // not currenty used
    define("ITEM_OBFUSCATED_IMAGE","e");
    define("ITEM_OBFUSCATED_CATEGORY","f");
    define("ITEM_OBFUSCATED_SERIAL_NUMBER","g");
    define("ITEM_OBFUSCATED_ORIGINAL_PURCHASE_PRICE","h");
    define("ITEM_OBFUSCATED_IS_APPROVED","i");
    define("ITEM_OBFUSCATED_OWNER_ID","j");  // not currenty used
    define("ITEM_OBFUSCATED_DAYS_TO_MINIMUM_PRICE","k"); // not currenty used
    define("ITEM_OBFUSCATED_RECEIPT","l");
    define("ITEM_OBFUSCATED_DOCUMENTATION","m");
    define("ITEM_OBFUSCATED_ORIGINAL_PURCHASE_DATE","n");    // not currenty used
    define("ITEM_OBFUSCATED_REJECTION_REASON","o");  // not currenty used
    define("ITEM_OBFUSCATED_WAS_REVIEWED","p");  // not currenty used


    // ITEM TABLE COLUMNS
    define("ITEM_TABLE_I_ID","i_id");
    define("ITEM_TABLE_I_NAME","i_name");
    define("ITEM_TABLE_I_DESCRIPTION","i_description");
    define("ITEM_TABLE_CURRENT_PRICE","current_price");
    define("ITEM_TABLE_I_IMAGE","i_image");
    define("ITEM_TABLE_I_CATEGORY_ID","i_category_Id");
    define("ITEM_TABLE_I_SERIALNUM","i_serialnum");
    define("ITEM_TABLE_ORIGINAL_PRICE","original_price");
    define("ITEM_TABLE_IS_APPROVED","is_approved");
    define("ITEM_TABLE_OWNER_ID","owner_id");
    define("ITEM_TABLE_DAYS_TO_MINIMUM_PRICE","days_to_minimum_price");
    define("ITEM_TABLE_RECEIPT","receipt");
    define("ITEM_TABLE_DOCUMENTATION","documentation");
    define("ITEM_TABLE_ORIGINAL_PURCHASE_DATE","original_purchase_date");
    define("ITEM_TABLE_REJECTION_REASON","rejection_reason");
    define("ITEM_TABLE_WAS_REVIEWED","was_reviewed");
    define("ITEM_TABLE_TIMESTAMP","timestamp");
    define("ITEM_TABLE_ADMIN_REVIEW","admin_review");
    define("ITEM_TABLE_REJECTED","rejected");
    define("ITEM_TABLE_ADDED_TO_SYSTEM","added_to_system");
    define("ITEM_TABLE_UPGRADED","upgraded");
    define("ITEM_TABLE_REPAIRED","repaired");
    define("ITEM_TABLE_LISTED_FOR_SALE","listed_for_sale");
    define("ITEM_TABLE_DELISTED_FROM_SALE","delisted_from_sale");
    define("ITEM_TABLE_IN_CART","in_cart");
    define("ITEM_TABLE_PENDING_SALE","pending_sale");
    define("ITEM_TABLE_SOLD","sold");
    define("ITEM_TABLE_NEW_OWNER_RECEIVED","new_owner_received");
	
	//USER TABLE COLUMNS
	define("USER_TABLE_ID","id");
    define("USER_TABLE_USERNAME","username");
    define("USER_TABLE_EMAIL","email");
    define("USER_TABLE_PASSWORD","password");
    define("USER_TABLE_ADMIN","admin");
    define("USER_TABLE_CREATED_AT","created_t");
    define("USER_TABLE_UPDATED_AT","updated_at");
    define("USER_TABLE_FIRST_NAME","fname");
    define("USER_TABLE_LAST_NAME","lname");
    define("USER_TABLE_ADDR_LINE_1","addr_line_1");
	define("USER_TABLE_ADDR_LINE_2","addr_line_2");
	define("USER_TABLE_CITY","city");
	define("USER_TABLE_STATE","state");
	define("USER_TABLE_ZIP","zip");
	define("USER_TABLE_PHONE","phone");


    // ORDER TABLE COLUMNS
    define("ORDER_TABLE_ID","o_id");
    define("ORDER_TABLE_TIMESTAMP","o_date");
    define("ORDER_TABLE_STATUS","o_status");
    define("ORDER_TABLE_ITEM_ID","o_item_id");
    define("ORDER_TABLE_BUYER_ID","o_buyer_id");
    define("ORDER_TABLE_SELLER_ID","o_seller_id");
    define("ORDER_TABLE_TRANSACTION_ID","o_transaction_id");
    define("ORDER_TABLE_TRANSACTION_AUTHENTICATION_CODE","o_transactio_auth_code");
    define("ORDER_TABLE_EVENT_DESCRIPTION","event_description");
    define("ORDER_TABLE_EVENT_TIMESTAMP","event_timestamp"); // not needed
    define("ORDER_TABLE_AGREEMENT_PRICE","agreement_price");


    // EVENT TABLE COLUMNS
    define("EVENT_TABLE_ID","id");
    define("EVENT_TABLE_ORDER_ID","order_id");
    define("EVENT_TABLE_ITEM_ID","item_id");
    define("EVENT_TABLE_DESCRIPTION","description");
    define("EVENT_TABLE_TIMESTAMP","timestamp");
    define("EVENT_TABLE_DATE","date");
    define("EVENT_TABLE_TYPE","type");
    define("EVENT_TABLE_COST","cost");


    // EVENT TABLE DEFAULT VALUES
    define("EVENT_TYPE_ADMIN_REVIEW","admin_review");
    define("EVENT_TYPE_REJECTED","rejected");
    define("EVENT_TYPE_ADDED_TO_SYSTEM","added_to_system");
    define("EVENT_TYPE_UPGRADED","upgraded");
    define("EVENT_TYPE_REPAIRED","repaired");
    define("EVENT_TYPE_LISTED_FOR_SALE","listed_for_sale");
    define("EVENT_TYPE_DELISTED_FROM_SALE","delisted_from_sale");
    define("EVENT_TYPE_IN_CART","in_cart");
    define("EVENT_TYPE_PENDING_SALE","pending_sale");
    define("EVENT_TYPE_SOLD","sold");
    define("EVENT_TYPE_NEW_OWNER_RECEIVED","new_owner_received");


    // TIMELINE
    define("TIMELINE_REDUCER_BUBBLE","bubble");
    define("TIMELINE_REDUCER_TITLE","event_title");
    define("TIMELINE_REDUCER_BODY","event_body");


    // INSERT COLUMNS
    define("INSERT_COLUMNS_EVENT_TABLE",array('id','order_id','item_id','description','timestamp','date','cost','type'));
    define("INSERT_COLUMNS_ORDERS_TABLE",array('id','o_date','o_status','o_item_id','o_buyer_id','o_seller_id','o_transaction_id','o_transaction_auth_code','event_description','event_timestamp','agreement_price'));
    
?>

