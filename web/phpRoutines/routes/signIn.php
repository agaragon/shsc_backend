<?php
include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/headersConfig.php";
include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbConnection.php";
include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/listUserFiles.php";
$dbopts = parse_url(getenv('DATABASE_URL'));
function signIn(){
    include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbCredentials.php";
    $token = $_POST['token'];
    $sql = "SELECT fullname,email,usersaddress,username FROM user WHERE token='".$_POST["token"]."'";
    $conn = createDBConnection($dbServername,$dbUsername,$dbPassword,$dbName,$dbPort);
echo"<br>";
echo$dbServername;
echo"<br>";
echo$dbopts["host"];
echo"<br>";
echo$dbUsername;
echo"<br>";
echo$dbopts["user"];
echo"<br>";
echo$dbPassword;
echo"<br>";
echo$dbopts["pass"];
echo"<br>";
    $conn = createDBConnection($dbopts["host"],$dbopts["user"],$dbopts["pass"],ltrim($dbopts["path"],'/'),$dbopts["port"]);
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $fullname = $result[0][0];
    $email = $result[0][1];
    $usersaddress = $result[0][2];
    $username = $result[0][3];
    $searchResult = array(
        "fullName"=>$fullname,
        "email"=>$email,
        "token"=>$token,
        "usersaddress"=>$usersaddress,
        "userName"=>$username,
    );
    if($fullname==""){
        $searchResult["loginSuccessful"] = "false";
    }else{
        $searchResult["loginSuccessful"] = "true";
    }
    
    // listUserFiles($username,$searchResult);
    // echo json_encode(listUserFiles($fullname,$searchResult));
    // listUserFiles($username,$searchResult);
    echo json_encode($searchResult);
    $conn = null;
}

?> 