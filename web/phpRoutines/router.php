<?php
$action = $_POST['action'];
if(isset($action)){
switch ($action) {
    case 'saga/REGISTRATION':
        $tableName = 'user_table';
        include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/headersConfig.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/routes/registration.php";
        registration($tableName);
    break;
    case 'saga/AUTHENTICATION':
        include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/routes/signIn.php";
        signIn();
    break;
    case "saga/SEND_IMAGE_INFO":
        include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/headersConfig.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/dbConnection.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/routes/uploadFile.php";
        uploadFile();
    break;
    case "SAGA_UPLOAD_IMAGE":
        include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/headersConfig.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/routes/uploadImage.php";
        uploadImage();
    break;
    case "saga/GET_PHOTOS":
        include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/helpers/headersConfig.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/web/phpRoutines/routes/getUserPhotos.php";
        getUserPhotos();
    break;
}};
?>