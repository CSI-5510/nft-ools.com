<?php

    
    /** maps data returned by DatabaseConnector::getCategoryCarouselData() to printTile()'s input parameter, $data
     *
     * @param  mixed $data - from DB: {"c_name", "c_id", "i_image"}
     * @return mixed {"name", "id", "image"}
     */
    function mapCategoryToTile($data){
        return [
            "name"=> $data['cat_name'],
            "id"=> $data['cat_id'],
            "image"=> $data['i_image']
        ];
    }

    
    /** maps data returned by DatabaseConnector::getItemsData() to printTile()'s input parameter, $data 
     * 
     * @param  mixed $data - from DB: {"i_name", "i_id", "i_image", ...} 
     * @return mixed {"name", "id", "image"}
     */
    function mapItemToTile($data){
        var_dump($data);
        echo "<br>";
        return [
            "name"=> $data['i_name'],
            "id"=> $data['i_id'],
            "image"=> $data['i_image']
        ];
    }

    
    /** returns string for HTML image element's src attribute
     *
     * @param  mixed $blob image blob from db
     * @return string 'data:image/jpeg;base64,'.base64_encode($blob)
     */
    function imageSrc($blob){
        return 'data:image/jpeg;base64,'.base64_encode($blob);
    }

    
    /** Prints a single "tile" to the page.
     * 
     * @param  mixed $data - {"name", "id", "image"}
     * @param  mixed $link "/public_html/[category]/[id]
     * @return void prints to page
     */
    function printTile($data, $link){
		//absolute path version, configurable for local development
		$link = ''.$GLOBALS['config']['url_root'].''.$link.'';
        return '
            <div class="m-10 w-64 h-64 p-0 m-0 bg-gray-200">
                <a href="'.$link.'">
                    <div class="p-0 m-0 bottom-0">'.$data["name"].'</div>
                    <image class="w-full h-full p-0 m-0" src="'.imageSrc($data["image"]).'"/>
                </a>
            </div>
        ';
        return;
    }

    
    /** returns a string of HTML for displaying an item image, name, description, and price in a row format
     *
     * @param  mixed $data returned from DatabaseConnector::getItemData($id)
     * @parma  mixed $link link as a string for <a> element's href attribute
     * @return string assembeled HTML for item row display
     */
    function drawItemRow($data){
        $link = generalNavigation(array(URL_ITEM, $data[ITEM_TABLE_ID]));
        return '
            <a href="'.$link.'">
                <div class="grid grid-rows-1 grid-cols-12 mx-20 mb-5">
                    <image class="row-span-1 col-span-3 mr-1" src="'.imageSrc($data[ITEM_TABLE_IMAGE]).'"/>
                    <div class="row-span-1 col-span-9 p-4 bg-gray-300">
                        <div class="grid grid-rows-4 grid-cols-1">
                            <div class="row-span-1 col-span-1 mb-1 p-4 bg-gray-200">
                                <span class="text-xl font-bold">
                                    '.$data[ITEM_TABLE_NAME].'
                                </span>
                            </div>
                            <div class="grid row-span-3 col-span-1">
                                <div class="grid grid-rows-1 grid-cols-4">
                                    <div class="row-span-1 col-span-3 mr-1 p-4 bg-gray-200">
                                        <span class="text-lg">
                                            '.$data[ITEM_TABLE_DESCRIPTION].'
                                        </span>
                                    </div>
                                    <div class="row-span-1 col-span-1 p-4 bg-gray-200">
                                        <span class="text-2xl font-bold text-right">
                                            $'.$data[ITEM_TABLE_CURRENT_PRICE].'
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            </a>  
        ';
    }


?>