<?php
$page = "user";
include_once '../../layout/cek_id.php';
include_once '../../layout/cek_hakAkses.php';
include_once '../../layout/header.php';

if(isset($_POST['tambah'])){
	$nama = $_POST['nama'];
	$username = $_POST['user'];
	$password = md5($_POST['pass']);
	$akses  = "1";

	if($admin->TambahtUser($nama,$username,$password, $akses)){ ?>
	<script type="text/javascript">
		$( document ).ready(function() {
			swal({title: "Selamat!", text: "Berhasil Menambahkan Data Baru", type: "success"},
				function(){
					document.location='../admin'
				}
			);
		});
	</script>
	<?php
}else { ?>
		<script type="text/javascript">
	      $( document ).ready(function() {
	        swal({title: "Maaf!", text: "Gagal menambahkan Data", type: "error"},
	          function(){
	            document.location=''
	          }
	        );
	      });
	    </script>
<?php
}
}
include_once '../../layout/navigation.php';
?>


<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tambah Admin
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
																<div class="form-group">
                                    <label for="exampleInputPassword1">Username</label>
                                    <input type="text" name="user" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
																<div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="pass" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                </div>

                                <button type="submit" name="tambah" class="btn btn-info">Tambah</button>
                            </form>
                            </div>

                        </div>
                    </section>
									</div>
								</div>
		</div>
	</section>

<?php include_once '../../layout/footer.php';

 ?>
<!--
  Notice: Undefined variable: page in D:\AAA\xampp\htdocs\osis\layout\navigation.php on line 46
-->
