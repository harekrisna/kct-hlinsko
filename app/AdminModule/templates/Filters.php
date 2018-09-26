<?php
class Filters {
     public static function initialize($filter, $value) {
        if (method_exists(__CLASS__, $filter)) {
            $args = func_get_args();
            array_shift($args);
            return call_user_func_array([__CLASS__, $filter], $args);
        }
    }
        
    public static function dynamicDate($year, $month = "", $day = "") {
        if ($month && $day) { return $day.'.'.$month.'.'.$year; }
        elseif ($month) {     return $month.".".$year; }
        else {                return $year; }
    }   
    
    public static function czDate($date, $format) {
        $en = array("January","February","March","April","May","June","July","August","September","October","November","December");
        $cz = array("led", "úno", "bře", "dub", "kvě", "čvn", "čvc", "srp", "zář", "říj", "lis", "pro");

        $timestamp = strtotime($date);
        $readable_date = date($format, $timestamp);
        $readable_date = str_replace($en, $cz, $readable_date); 
        return $readable_date;
    }

    public static function czInflection($count, $nominative, $genitive, $plural_genitive) {
        if($count == 1)
            return $nominative;
        elseif($count >= 2 && $count <= 4)
            return $genitive;
        else 
            return $plural_genitive;
    }  
}