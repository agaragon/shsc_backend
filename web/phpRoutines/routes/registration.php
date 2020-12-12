<?php
include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbConnection.php";
include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/checkExistence.php";
include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/createFolder.php";

function registration($tableName){
  include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbCredentials.php";
  try {
    $fullName = $_POST['fullName'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $usersAddress = $_POST['address'];
    $usersPassword = $_POST['password'];
    $token = $_POST['token'];
    $tableName = 'user_table';
    $conn = createDBConnection($dbServername,$dbUsername,$dbPassword,$dbName,$dbPort);
    $shouldCreateUser = 0;
    $shouldCreateUser += checkExistence($_POST['userName'],'username',$tableName,$conn);
    $shouldCreateUser += checkExistence($_POST['fullName'],'fullname',$tableName,$conn);
    $shouldCreateUser += checkExistence($_POST['email'],'email',$tableName,$conn);
    if($shouldCreateUser === 0){
    //   $sql = "INSERT INTO $tableName (username,fullname,email,usersaddress,userspassword,token)
    // VALUES ('$fullName','$userName','$email','$usersAddress','$usersPassword','$token')";
      $sql = "INSERT INTO $tableName values ($fullName,$userName,$email,$usersAddress,$usersPassword,$token)";
    // VALUES ('$fullName','$userName','$email','$usersAddress','$usersPassword','$token')";
    echo $sql;
      $conn->exec($sql);
    echo "execution successful";
      // createImagesTable($userName);
      $responseDictionary = array("status"=>"200","message"=>"O usuário foi criado com sucesso!");
      createFolder($userName);
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