<?php
  require_once("../../function/function.php");
  include_once '../../layout/cek_hakAkses.php';
  $admin = new ADMIN();

  if(isset($_POST['query'])){
    $q = $_POST['query'];

    $query = "SELECT * FROM users WHERE nama LIKE '%". $q. "%' && akses != 1";
    $admin->dataViewUsers($query);
  }else{
    $query = "SELECT * FROM users WHERE akses != 1";
    $admin->dataViewUsers($query);
  }

 ?>
