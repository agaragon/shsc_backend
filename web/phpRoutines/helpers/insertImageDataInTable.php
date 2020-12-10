<?php 
include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbConnection.php";

function insertImageDataInTable(){
    include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbCredentials.php";
    $imagename = $_POST['imagename'];
    $username = $_POST['username'];
    $imageaddress = $_POST['imageaddress'];
    $imagedrescription = $_POST['imagedescription'];
    $price= $_POST['price'];
    $brand = $_POST['brand'];
    $conn = createDBConnection($dbServername,$dbUsername,$dbPassword,$dbNameImages);
    $sql = "INSERT INTO $dbTableImages (imagename,username,imageaddress,imagedescription,price,brand)
    VALUES ('$imagename','$username','$imageaddress','$imagedrescription','$price','$brand')";

}

?>