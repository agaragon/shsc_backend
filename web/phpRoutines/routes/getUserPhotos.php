<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/headersConfig.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbConnection.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/listUserFiles.php";
    
    function getUserPhotos(){
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbCredentials.php";
        $token = $_POST['token'];
        $connMain = createDBConnection($dbServername,$dbUsername,$dbPassword,$dbName,$dbPort);
        $sqlMain = "SELECT username FROM $dbUserTable WHERE token='".$_POST["token"]."'";
        $stmtMain = $connMain->prepare($sqlMain);
        $stmtMain->execute();
        $resultMain = $stmtMain->fetchAll();
        $username = $resultMain[0][0];
        $connImages = createDBConnection($dbServername,$dbUsername,$dbPassword,$dbName,$dbPort);
        $sqlImages = "SELECT imagename,imageaddress,imagedescription,price,brand FROM $dbTableImages WHERE username='$username'";
        $stmtImages = $connImages->prepare($sqlImages);
        $stmtImages->execute();
        $resultImages = $stmtImages->fetchAll();

        echo json_encode($resultImages);  
        $conn = null;
    }
?>