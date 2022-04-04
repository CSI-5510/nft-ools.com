<?php

    
    /** extracts name and id from DatabaseConnector::getCategoryTilesData(), used in header navigation
     *
     * @param  mixed $data - {"i_name", "i_id", ...}
     * @return mixed - {"name", "id"}
     */
    function mapCategoryToLink($data){
        return [
            "name"=> $data["cat_name"],
            "id"=> $data["cat_id"]
        ];
    }

    
    /** extracts name and id from DatabaseConnector::getItemsData()
     *
     * @param  mixed $data - {"i_name", "i_id", ...}
     * @return mixed - {"name", "id"}
     */
    function mapItemToLink($data){
        return [
            "name"=> $data["i_name"],
            "id"=> $data["i_id"]
        ];
    }

    
    /** prints individual category link to header
     *
     * @param  mixed $data - {"name", "id", ...}
     * @return void - prints to page:
     */
    function drawHeaderLink($data){
        echo '
            <li class="">
                <span>
                    <a href='.generalNavigation("category", $data["id"]).'>
                        '.$data["name"].'
                    </a>
                </span>
            </li>
        ';
        return;
    }

    
    /** prints all category links to header 
     *
     * @param  array $data - [{"c_name", "c_id", ...}, ...]
     * @return void
     */
    function drawHeaderLinks($data){
        foreach ($data as $row){
            drawHeaderLink(mapCategoryToLink($row));
        }
        return; 
    }
    

?>