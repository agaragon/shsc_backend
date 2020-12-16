<?php

$dbopts = parse_url(getenv('DATABASE_URL'));


// $dbServername = "sql210.epizy.com";
// $dbUsername = "epiz_26818797";
// $dbPassword = "2GmzkhXIquStP15";
// $dbName = "epiz_26818797_users";
// if(isset($dbopts)){
    $dbUsername = $dbopts["user"];
    $dbPassword = $dbopts["pass"];                   
    $dbServername = $dbopts["host"];
    $dbName = ltrim($dbopts["path"],'/');
    $dbPort = (string)$dbopts["port"];
// }else{
//     $dbUsername = "root";
//     $dbPassword = "";
//     $dbServername = "localhost";
//     $dbName = "users";
//     $dbPort = "5432";
// }
$dbUserTable = "user_table";
$dbTableImages = "images_table";

?>