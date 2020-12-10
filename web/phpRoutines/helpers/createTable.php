<?php
function createImagesTable($username){
        include("dbCredentials.php");
    try {
        $conn = createDBConnection($dbServername,$dbUsername,$dbPassword,'userimages');
        // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE $username (
        imagename VARCHAR(30) PRIMARY KEY,
        imageaddress VARCHAR(100) NOT NULL,
        descript VARCHAR(200) NOT NULL,
        brand VARCHAR(30) NOT NULL,
        price FLOAT(10)
        )";
        
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Table $username created successfully";
        } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
        
        $conn = null;
}
  ?>