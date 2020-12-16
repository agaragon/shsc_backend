<?php
$action = $_POST['action'];
if(isset($action)){
switch ($action) {
    case 'SAGA_REGISTRATION':
        $tableName = 'user_table';
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/headersConfig.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/routes/registration.php";
        registration($tableName);
    break;
    case 'saga/AUTHENTICATION':
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/routes/signIn.php";
        signIn();
    break;
    case "SAGA_SEND_IMAGE_INFO":
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/headersConfig.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbConnection.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/routes/uploadFile.php";
        uploadFile();
    break;
    case "SAGA_UPLOAD_IMAGE":
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/headersConfig.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/routes/uploadImage.php";
        uploadImage();
    break;
    case "SAGA_GET_STORE_PHOTOS":
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/headersConfig.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/routes/getUserPhotos.php";
        getUserPhotos();
    break;
}};
?>