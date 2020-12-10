<?php
function createFolder ($folder_name){
    $root = $_SERVER["DOCUMENT_ROOT"];
    $dir = $root . '/userData/' . $folder_name;
    if( !file_exists($dir) ) {
        mkdir($dir, 0755, true);
    }
};


?>
