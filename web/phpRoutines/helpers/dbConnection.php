<?php 
function createDBConnection($servername,$username,$password,$dbname){
  
  try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    return $conn;
  } catch(PDOException $e){
    $error = array("status"=>"500",
    "error"=>"Could not connect to db"
  );
  return $error;
  }
}

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "users";
// try {
//     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//   } catch(PDOException $e) {
//     echo "You could not connect to the db";
//   }

?>