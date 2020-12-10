<?php 
function checkExistence($value,$column,$tableName,$conn) {
    $sql = "SELECT $column FROM $tableName WHERE $column='".$value."'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    if(sizeof($result)){
        return true;
    }else{
        return false;
    }
}
?>