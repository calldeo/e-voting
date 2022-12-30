<?php
$page = "voted";
include_once '../../layout/cek_id.php';
include_once '../../layout/cek_hakAkses.php';
include_once '../../layout/header.php';
include_once '../../layout/navigation.php';
?>

<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Data Pemilih
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-12">
        <div class="table-responsive">
          <table class="table table-striped b-t b-light" id="dataTables-example">
            <thead>
              <tr>
                <th>Nama</th>
                <th>No Urut Calon</th>
                <th>Tanggal</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
              <?php
                $query = "SELECT a.id_user, a.nama, b.id_calon, b.tanggal FROM users as a join hasil_voting as b WHERE a.id_user = b.id_user ORDER BY tanggal DESC";  
                $admin->dataViewPolling($query);
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</section>





<?php include_once '../../layout/footer.php';

 ?>
<!--
  Notice: Undefined variable: page in D:\AAA\xampp\htdocs\osis\layout\navigation.php on line 46
-->
