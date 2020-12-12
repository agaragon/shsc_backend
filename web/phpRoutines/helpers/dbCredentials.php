<?php

$dbopts = parse_url(getenv('DATABASE_URL'));


// $dbServername = "sql210.epizy.com";
// $dbUsername = "epiz_26818797";
// $dbPassword = "2GmzkhXIquStP15";
// $dbName = "epiz_26818797_users";
$dbUsername = $dbopts["user"];
$password = $dbopts['pass'];                   
$dbServername = $dbopts['host'];
$dbName = ltrim($dbopts["path"],'/');
$dbPort = $dbopts["port"];
// $dbServername = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "users";
$dbNameImages = "userimages";
$dbTableImages = "images";

// echo$dbopts["pass"];
// echo$dbopts["host"];
// echo$dbopts["path"];
// echo ltrim($dbopts["path"],'/');
// echo$dbopts["port"];

?>