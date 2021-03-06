<?php
include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/dbConnection.php";
include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/checkExistence.php";
include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/createFolder.php";

function registration($tableName){
  include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/dbCredentials.php";
  try {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $usersAddress = $_POST['address'];
    $usersPassword = $_POST['password'];
    $token = $_POST['token'];
    $conn = createDBConnection($dbServername,$dbUsername,$dbPassword,$dbName,$dbPort);
    $shouldCreateUser = 0;
    $shouldCreateUser += checkExistence($_POST['username'],'username',$tableName,$conn);
    $shouldCreateUser += checkExistence($_POST['fullname'],'fullname',$tableName,$conn);
    $shouldCreateUser += checkExistence($_POST['email'],'email',$tableName,$conn);
    if($shouldCreateUser === 0){
    $sql = "INSERT INTO $dbUserTable(username,fullname,email,usersaddress,userspassword,token)
     values ('$fullname','$username','$email','$usersAddress','$usersPassword','$token')";
      $conn->exec($sql);
      $responseDictionary = array("status"=>"200","message"=>"O usuário foi criado com sucesso!");
      createFolder($username);
      header('Content-Type: application/json');
      echo json_encode($responseDictionary);
    }else{
      $responseDictionary = array("status"=>"500","message"=>"Esse usuário já existe no banco de dados");
      header('Content-Type: application/json');
      echo json_encode($responseDictionary);
    }
  } catch(PDOException $e) {
    $responseDictionary = array("status"=>"500","message"=>"Você não conseguiu se conectar ao banco de dados");
    echo json_encode($responseDictionary);
  }
  $conn = null;
}
?>