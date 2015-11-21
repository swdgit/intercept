<?php
class Util {

    public static function formatPhone($phone) {
        $number = $phone;
        if ($phone != NULL) {
            $number =  preg_replace("/\D/", '', $phone);
        }
        return $number;
    }
    
    /** when we get a value with mm in it we just need to strip that out.
     * @param unknown $value
     */
    public static function getMilliMeters($value) {
        
        $mm = 0.0;
        $mm = trim($value, "m");
        return $mm;
    }
    
}

?>