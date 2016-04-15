<?php

namespace App\Services;
class validationService
{

    function isValidString($stringToCheck) {
        if (isset($stringToCheck)) {
            $trimmed = trim($stringToCheck);
            if (strlen($trimmed) > 0) {
                return true;
            }
        }
        return false;
    }

    function isValidInt($intToCheck) {
        if (isset($intToCheck)) {
            return intval($intToCheck) != 0;
        }
        return false;
    }    
}