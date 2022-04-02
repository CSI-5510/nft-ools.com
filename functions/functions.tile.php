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
        return [
            "name"=> $data['i_name'],
            "id"=> $data['i_id'],
            "image"=> $data['i_image']
        ];
    }

    
    /** Prints a single "tile" to the page.
     * 
     * @param  mixed $data - {"name", "id", "image"}
     * @param  mixed $link "/public_html/[category]/[id]
     * @return void prints to page
     */
    function printTile($data, $link){
        echo '
            <div class="w-64 h-64 p-0 m-0 bg-gray-200">
                <a href="'.$link.'">
                    <div class="p-0 m-0 bottom-0">'.$data["name"].'</div>
                    <image class="w-full h-full p-0 m-0" src="data:image/jpeg;base64,'.base64_encode($data["image"]).'"/>
                </a>
            </div>
        ';
        return;
    }


?>