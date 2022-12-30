<?php
$page = "user";
include_once '../../layout/cek_id.php';
include_once '../../layout/cek_hakAkses.php';
include_once '../../layout/header.php';

if(isset($_GET['id_user'])){
	$id = $_GET['id_user'];
	extract($admin->GetUser($id));
}

if(isset($_POST['edit'])){
	$id = $_GET['id_user'];
	$nama = $_POST['nama'];
	$username = $_POST['user'];
	$password = md5($_POST['pass']);
	$akses  = "2";

	if($admin->updateUser($id,$nama,$username,$password, $akses)){ ?>
		<script type="text/javascript">
			$( document ).ready(function() {
				swal({title: "Sukses!", text: "Data Berhasil Di Edit", type: "success"},
					function(){
						document.location='../user/'
					}
				);
			});
		</script>
		<?php
	}else {
		?>
		<script type="text/javascript">
	      $( document ).ready(function() {
	        swal({title: "Maaf!", text: "Gagal Mengedit Data!", type: "error"},
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
                            Tambah User
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input type="text" name="nama" value="<?php echo $nama?>" class="form-control" id="exampleInputPassword1" placeholder="Password" required onkeyup="lettersOnly(this)">
                                </div>
																<div class="form-group">
                                    <label for="exampleInputPassword1">Username</label>
                                    <input type="text" name="user" value="<?php echo $username?>" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
																<div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="pass" value="<?php echo $password?>" class="form-control" id="exampleInputPassword1" placeholder="Password"required> 
                                </div>

                                <button type="submit" name="edit" class="btn btn-info">Edit</button>
                            </form>
                            </div>

                        </div>
                    </section>
									</div>
								</div>
		</div>
	</section>

	<script >
		function lettersOnly(input) {
    	var regex = /[^a-z ]/gi;
    	input.value = input.value.replace(regex, "");
		}
    </script>

<?php include_once '../../layout/footer.php';

 ?>
<!--
  Notice: Undefined variable: page in D:\AAA\xampp\htdocs\osis\layout\navigation.php on line 46
-->
