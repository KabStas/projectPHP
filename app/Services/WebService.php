<?php

namespace App\Services;

use Illuminate\Http\Request;

class WebService
{
    public function outputtingPHPInfo() {
        return response(phpinfo(),200);
    }

    public function checkingForPalindrome($string) {

        $signs = array("?", "!", ".", ",", ":", '"',"/", "%" );    
        $string = str_replace($signs, "", $string);
        $reversedString = strrev($string);

        if (strcasecmp($string, $reversedString) == 0) {
            return 'Entered string is palindrome';
        } else {
            return 'Entered string is NOT palindrome';
        }   
    }

    public function checkingForIP() {

        $ip = $_SERVER['REMOTE_ADDR'];
        $long = ip2long($ip);

        if (($long >= 167772160 && $long <= 184549375) || ($long >= 2886729728 && $long <= 2887778303) || ($long >= 3232235520 && $long <= 3232301055)) {
            $result = "серый";
        } else {
            $result = "белый";
        }
        echo "ВАШ IP: " . $ip . "</br> IP: " . $result;
    }
}