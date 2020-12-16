<?php
include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/headersConfig.php";
include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/dbConnection.php";
include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/listUserFiles.php";
$dbopts = parse_url(getenv('DATABASE_URL'));
function signIn(){
    include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/dbCredentials.php";
    $token = $_POST['token'];
    $sql = "SELECT fullname,email,usersaddress,username FROM $dbUserTable WHERE token='".$_POST["token"]."'";
    $conn = createDBConnection($dbServername,$dbUsername,$dbPassword,$dbName,$dbPort);
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $fullname = $result[0][0];
    $email = $result[0][1];
    $usersaddress = $result[0][2];
    $username = $result[0][3];
    $searchResult = array(
        "fullname"=>$fullname,
        "email"=>$email,
        "token"=>$token,
        "usersaddress"=>$usersaddress,
        "username"=>$username,
    );
    if($fullname==""){
        $searchResult["loginSuccessful"] = "false";
    }else{
        $searchResult["loginSuccessful"] = "true";
    }
    
    echo json_encode($searchResult);
    $conn = null;
}

?> 