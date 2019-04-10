<?php

function chunkArray($field, $randomized = 'true', $number) {
    if ($randomized) {
        $retVal = []; 
        while (!empty($field)) { 
            $retVal[] = array_splice($field, 0, rand(3,5)); 
        } 
        return $retVal;
    } else {
        array_chunk($field, $number);
    }
}