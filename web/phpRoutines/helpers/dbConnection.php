<?php 
function createDBConnection($servername,$username,$password,$dbname,$port){
  try{
    // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = new PDO("pgsql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    return $conn;
  } catch(PDOException $e){
    $error = array("status"=>"500",
    "error"=>"Could not connect to db"
  );
  echo $e;
  return $error;
  }
}

?>