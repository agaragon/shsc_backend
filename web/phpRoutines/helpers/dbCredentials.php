<?php

$dbopts = parse_url(getenv('DATABASE_URL'));


// $dbServername = "sql210.epizy.com";
// $dbUsername = "epiz_26818797";
// $dbPassword = "2GmzkhXIquStP15";
// $dbName = "epiz_26818797_users";

// $dbUsername = $dbopts["user"];
// $dbPassword = $dbopts["pass"];                   
// $dbServername = $dbopts["host"];
// $dbName = ltrim($dbopts["path"],'/');
// $dbPort = (string)$dbopts["port"];

$dbServername = "localhost";
// $dbUsername = "root";
$dbUsername = "postgres";
$dbPassword = "A463112b(";
$dbName = "users";
$dbPort = "5432";

$dbNameImages = "userimages";
$dbTableImages = "images_table";
$dbUserTable = "user_table";

?>