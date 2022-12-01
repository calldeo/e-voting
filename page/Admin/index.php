<?php
$page = "Admin";
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
      Data  Admin
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-12">
        <a class="btn btn-sm btn-primary" href="tambah.php">Tambah</a>
      </div>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-12">
        <div class="table-responsive">
          <table class="table table-striped b-t b-light" id="dataTables-example">
            <thead>
              <tr>
                <th style="width:20px;">No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Hak Akses</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $query = "SELECT * FROM users WHERE akses=1";  
                $admin->dataviewUsers($query);
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
