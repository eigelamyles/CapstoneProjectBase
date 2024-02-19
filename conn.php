<?php 
    date_default_timezone_set("Asia/Manila");
    $conn = mysqli_connect('localhost','root','','certificate');

    /*
    $rawUnixTimestamp = time();
    $formattedTimestamp = date("M d Y h:i:s A", $rawUnixTimestamp);

    echo "Raw Unix Timestamp Data: ".$rawUnixTimestamp."<br/>";
    echo "Month: ".date("M", $rawUnixTimestamp)."<br/>";
    echo "Day: ".date("d", $rawUnixTimestamp)."<br/>";
    echo "Year: ".date("Y", $rawUnixTimestamp)."<br/>";
    echo "Hour: ".date("h", $rawUnixTimestamp)."<br/>";
    echo "Minute: ".date("i", $rawUnixTimestamp)."<br/>";
    echo "Seconds: ".date("s", $rawUnixTimestamp)."<br/>";
    echo "Formatted(Readable): ".$formattedTimestamp;
    */
?>