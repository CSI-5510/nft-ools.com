<?php

    
    /** calculate the price of an item
     *
     * @param  float $price original purchase price
     * @param  string $born date & time of original purchase
     * @param  float $floor minimum sale price as ratio of $price, 0.0 to 1.0
     * @param  float $days_to_minimum days to reach minimum price
     * @return float depreciated price: (depreciation + floor) * price
     */
    function pricing($price, $born, $floor, $days_to_minimum){
        $gamma = calculateGamma($days_to_minimum);
        $depreciation = depreciation($born, $gamma);
        $depreciation = applyFloor($depreciation, $floor);
        return round($depreciation * $price, 2);
    }
    
    
    /** determines depreciation coefficient
     *
     * @param  string $born date & time of original purchase
     * @param  float $gamma sigmoid horizontal scale factor, second timebase
     * @return float 0.0 to 1.0
     */
    function depreciation($born, $gamma){
        $now = time();
        $age = ($now - strtotime($born))/daysToSeconds(1);
        $x = scaleToGamma($age, $gamma);
        return sigmoid($x, $gamma);
    }

    
    /** scales the depreciation sigmoid range between the floor and 1.0
     *
     * @param  mixed $depreciation
     * @param  mixed $floor
     * @return float 
     */
    function applyFloor($depreciation, $floor){
        return (1 - $floor) * $depreciation + $floor;
    }

    
    /** generic sigmoid with horizontal scale factor
     *
     * @param  mixed $x independent variable
     * @param  mixed $gamma horizontal scale factor
     * @return float 0.0 to 1.0
     */
    function sigmoid($x, $gamma){
        return 1-1/(1+exp(-$x*$gamma));
    }

    
    /** adjusts age to sigmoid independent variable range
     *
     * @param  mixed $age item age in seconds
     * @param  mixed $gamma sigmoid horizontal scale factor
     * @return float adjusted age: age - 5 / gamma
     */
    function scaleToGamma($age, $gamma){
        return $age - 5 / $gamma;
    }

    
    /** returns total number of seconds in given days
     *
     * @param  int $days number of days
     * @return int days * 86,400
     */
    function daysToSeconds($days){
        $SECONDS_PER_DAY = 86400;
        return $days * $SECONDS_PER_DAY;
    }

    
    /** calculates gamma based on number of days until full depreciation
     *
     * @param  int $days number of days until full depreciation
     * @return float gamma: gamma is the effective transitional domain of the sigmoid. values of x outside of gamma produce values of y approaching 1 or 0 (0.9993%). x is added to gamma to shift the sigmoid to the right so that the depreciation at the date of purchase would have been equal to 1.
     */
    function calculateGamma($days){
        return 10 / $days;
    }


?>