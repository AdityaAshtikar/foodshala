<?php
    
    // global

    class Globals {

        public static $CURRENT_TIMESTAMP_FORMAT = 'Y-m-d H:i:s';
        public static $DEFAULT_TIMEZONE = "Asia/Kolkata";

        public static $TYPE = "type";
        public static $TAB = "tab";

        // session vars
        public static $SESSION_EMAIL = 'email';
        public static $SESSION_IS_CUSTOMER = 'is_customer';

        public static function getCurrentTimeStamp ($timeformat=null, $timezone=null) {
            $format = ($timeformat == null) ? static::$CURRENT_TIMESTAMP_FORMAT : $timeformat;
            $zone = ($timezone == null) ? static::$DEFAULT_TIMEZONE : $timezone;

            $date = new DateTime("now", new DateTimeZone($zone));
            // echo $date->format($format);
            return $date->format($format);
        }
    }

?>