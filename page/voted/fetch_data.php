<?php
  require_once("../../function/function.php");
  include_once '../../layout/cek_hakAkses.php';
  $admin = new ADMIN();

  if(isset($_POST['query'])){
    $q = $_POST['query'];

    $query = "SELECT a.id_user, a.nama, b.id_calon, b.tanggal FROM users as a join hasil_voting as b WHERE a.id_user = b.id_user && nama LIKE '%".$q."%' ORDER BY tanggal DESC";
    $admin->dataViewPolling($query);
  }else{
    $query = "SELECT a.id_user, a.nama, b.id_calon, b.tanggal FROM users as a join hasil_voting as b WHERE a.id_user = b.id_user ORDER BY tanggal DESC";
    $admin->dataViewPolling($query);
  }

 ?>
