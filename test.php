<?php 

    include('conn.php');
    include('keys.php');

    // echo date($CURRENT_TIMESTAMP_FORMAT);

    // $date = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
    // echo $date->format($CURRENT_TIMESTAMP_FORMAT);

    echo Globals::getCurrentTimeStamp();

?>