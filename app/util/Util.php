<?php
class Util {

    public static function formatPhone($phone) {
        $number = $phone;
        if ($phone != NULL) {
            $number =  preg_replace("/\D/", '', $phone);
        }
        return $number;
    }
}

?>