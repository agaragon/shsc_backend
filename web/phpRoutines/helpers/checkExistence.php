<?php 
function checkExistence($value,$column,$tableName,$conn) {
    echo "step1";
    $sql = "SELECT $column FROM $tableName WHERE $column='".$value."'";
    echo "step2";
    $stmt = $conn->prepare($sql);
    echo "step3";
    $stmt->execute();
    echo "step4";
    $result = $stmt->fetchAll();
    echo "step5";
    if(sizeof($result)){
        echo "step6";
        return true;
    }else{
        echo "step7";
        return false;
    }
}
?>