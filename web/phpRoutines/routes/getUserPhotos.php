<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/headersConfig.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbConnection.php";
    include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/listUserFiles.php";
    
    function getUserPhotos(){
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbCredentials.php";
        $token = $_POST['token'];
        $connMain = createDBConnection($dbServername,$dbUsername,$dbPassword,$dbName,$dbPort);
        $sqlMain = "SELECT username FROM $dbUserTable WHERE token='".$_POST["token"]."'";
        echo "Step1";
        $stmtMain = $connMain->prepare($sqlMain);
        $stmtMain->execute();
        echo "Step2";
        $resultMain = $stmtMain->fetchAll();
        $userName = $resultMain[0][0];
        echo $userName;
        $connImages = createDBConnection($dbServername,$dbUsername,$dbPassword,$dbNameImages,$dbPort);
        echo "step 2.5";
        $sqlImages = "SELECT imagename,imageaddress,imagedescription,price,brand FROM $dbTableImages WHERE username='$userName'";
        echo $sqlImages;
        // $stmtImages = $connImages->prepare($sqlImages);
        $stmtImages = $connImages->exec($sqlImages);
        echo "Step3";
        // $stmtImages->execute();
        echo "Step4";
        $resultImages = $stmtImages->fetchAll();

        echo json_encode($resultImages);  
        $conn = null;
    }
?>