<?php

function uploadImage(){
  $path =  "/userData/" . $_POST['fullName'] . "/";
  $path = $path . basename( $_FILES['fileName']['name']);
  $file_type = $_FILES['fileName']['type'];
  $allowed = array("image/jpeg", "image/gif", "image/png");
  
  if(!in_array($file_type, $allowed)) {
      $error_message = 'Only jpg, gif, and png files are allowed.';
      $response = array(
        "status"=>"403",
        "message"=>"Somente jpg, git e png são arquivos aceitos"
    );
    echo json_encode($response);
      exit();
    }
  if(move_uploaded_file($_FILES['fileName']['tmp_name'], $path))
   { 
    $response = array(
        "status"=>"200",
        "message"=>"Parabéns! Sua foto foi guardada com sucesso. Acesse sua loja para vê-la."
    );
    echo json_encode($response); } 
   else{ 
       $response = array(
           "status"=>"500",
           "message"=>"Algo de errado não está certo, por favor tente novamente"
       );
    echo json_encode($response); }
}

?>