<?php 

    
    /** assembels array from mapCategoryToTile() results
     *
     * @param  array $data - [{"c_name", "c_id", "i_image"}, ...]
     * @return array - [{"name", "id", "image"}, ...]
     */
    function mapCategoryToCarousel($data){
        $output = array();
        for ($i=0; $i<6; $i++){
            $output[] = mapCategoryToTile($data[$i]);
        }
        return $output;
    }

    
    /** assembels array from mapItemToTile() results
     *
     * @param  array $data - [{"i_name", "i_id", "i_image", ...}, ...]
     * @param  array $pointers - item ids to be included in carousel
     * @return array - [{"name", "id", "image"}, ...]
     */
    function mapItemToCarousel($data, $pointers){
        $output = array();
        foreach ($pointers as $pointer){
            $output[] = mapItemToTile($data[$pointer]);
        }
        return $output;
    }

        
    /** places 6 tiles in carousel configuration
     *
     * @param  mixed $data - {"name", "id", "image"}
     * @param  string $area - 'category' or 'id', used to create url 
     * @return void - prints to page
     */
    function carousel($data, $area){
        echo "<div class='flex justify-center p-6 space-x-3'>";
        printTile($data[0], generalNavigation($area, $data[0]["id"]));
        printTile($data[1], generalNavigation($area, $data[1]["id"]));
        printTile($data[2], generalNavigation($area, $data[2]["id"]));
        echo "</div>";
        echo "<div class='flex justify-center p-6 space-x-3'>";
        printTile($data[3], generalNavigation($area, $data[3]["id"]));
        printTile($data[4], generalNavigation($area, $data[4]["id"]));
        printTile($data[5], generalNavigation($area, $data[5]["id"]));
        echo "</div>";
    }


?>