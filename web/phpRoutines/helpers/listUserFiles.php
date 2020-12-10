<?php 
function listUserFiles($userName, $originalArray){
    $scan = scandir('../userData/' . $userName);
    $fotos_array = array();
    
    foreach($scan as $file) {
       if (!is_dir("$userName/$file")) {
            array_push($fotos_array,$file);
        }
    }
    $originalArray["userPhotos"]=$fotos_array;
    return json_encode($originalArray);
}
?>