<?php
require(APPPATH.'/libraries/REST_Controller.php');

class Uploader extends REST_Controller{

  public function image_post()
  {
      $uploaddir = './img/';
      $name = $_FILES['image']['name'];
      $path_parts = pathinfo($name);
      $ext = $path_parts['extension'];
      $file_name = uniqid().'.'.$ext;
      $uploadfile = $uploaddir.$file_name;
      //echo $uploadfile;

      if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
          $dataDB['status'] = 'success';
          $dataDB['filename'] = $file_name;
       } else {
          $dataDB['status'] =  'failure';
       }
       $this->response($dataDB, 200);
  }
}

?>
