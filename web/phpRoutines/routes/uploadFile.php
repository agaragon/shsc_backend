<?php

function uploadFile(){
  include $_SERVER["DOCUMENT_ROOT"] . "/phpRoutines/helpers/dbCredentials.php";
  $imageName = $_POST["imageName"];
  $path =  "../userData/" . $_POST['fullName'] . "/";
  $path = $path . basename( $_FILES['fileName']['name']);
  $userName = $_POST['userName'];
  $imageaddress = $path;
  $imagedrescription = $_POST['descript'];
  $price= (float)$_POST['price'];
  $brand = $_POST['brand'];
  $conn = createDBConnection($dbServername,$dbUsername,$dbPassword,$dbNameImages);
  $tableName = $_POST["userName"];
  $sql = "INSERT INTO $dbTableImages (imagename,username,imageaddress,imagedescription,price,brand)
    VALUES ('$imageName','$userName','$imageaddress','$imagedrescription',$price,'$brand')";
  $conn->exec($sql);
  $conn = null;
}
 ?>
