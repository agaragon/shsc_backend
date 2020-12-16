<?php 
function listUserFiles($username, $originalArray){
    $scan = scandir('../userData/' . $username);
    $fotos_array = array();
    
    foreach($scan as $file) {
       if (!is_dir("$username/$file")) {
            array_push($fotos_array,$file);
        }
    }
    $originalArray["userPhotos"]=$fotos_array;
    return json_encode($originalArray);
}
?>