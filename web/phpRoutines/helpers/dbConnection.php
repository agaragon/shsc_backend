<?php 

function createDBConnection($servername,$username,$password,$dbname,$port){
  // echo "you started the dbFunction";
  try{
    // $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn = new PDO("pgsql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    echo "You connected to the db";
    return $conn;
  } catch(PDOException $e){
    echo "you didn't connect to the db";
    // echo $e;
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