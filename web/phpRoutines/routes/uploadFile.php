<?php

function uploadFile(){
  include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbCredentials.php";
  $imageName = $_POST["imageName"];
  $path =  "../userData/" . $_POST['fullName'] . "/";
  $path = $path . basename( $_FILES['fileName']['name']);
  $username = $_POST['username'];
  $imageaddress = $_POST['imageAddress'];
  $imagedrescription = $_POST['descript'];
  $price= (float)$_POST['price'];
  $brand = $_POST['brand'];
  $conn = createDBConnection($dbServername,$dbUsername,$dbPassword,$dbName,$dbPort);
  $tableName = $_POST["username"];
  $sql = "INSERT INTO $dbTableImages (imagename,username,imageaddress,imagedescription,price,brand)
    VALUES ('$imageName','$username','$imageaddress','$imagedrescription',$price,'$brand')";
  $conn->exec($sql);
  $conn = null;
}
 ?>
