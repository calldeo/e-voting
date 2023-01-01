<?php
	$page='calon';

	include_once '../../layout/cek_id.php';
	include_once '../../layout/cek_hakAkses.php';
	include_once '../../layout/header.php';

	if(isset($_POST['tambah_calon'])){
		$nama = $_POST['nama_calon'];
		$visi_visi = $_POST['visi_misi'];
		$jmlvote = 0;

		$imgFile= $_FILES['gambar']['name'];
		$tmp_dir = $_FILES['gambar']['tmp_name'];
		$imgSize = $_FILES['gambar']['size'];

		$upload_dir = '../../assets/foto_calon/';
		$imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
		$gambar = rand(1000, 1000000) . "." . $imgExt;

		if(in_array($imgExt, $valid_extensions)){
			if($imgSize < 5000000){
				move_uploaded_file($tmp_dir, $upload_dir.$gambar);
				if($admin->TambahtCalon($nama,$visi_visi, $gambar, $jmlvote)){ ?>
				<script type="text/javascript">
					$( document ).ready(function() {
						swal({title: "Selamat!", text: "Berhasil Menambahkan Data Baru", type: "success"},
							function(){
								document.location='../calon'
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

			}else{ ?>
				<script type="text/javascript">
					$( document ).ready(function() {
						swal({title: "Maaf!", text: "Gagal Upload", type: "error"},
							function(){
								document.location=''
							}
						);
					});
				</script>
			<?php }
		}else{ ?>
			<script type="text/javascript">
		      $( document ).ready(function() {
		        swal({title: "Maaf!", text: "Only Jpeg. jpg, png, gif, pdf!", type: "error"},
		          function(){
		            document.location=''
		          }
		        );
		      });
		    </script>
	<?php	}

		}
	include_once '../../layout/navigation.php'; ?>

	<section id="main-content">
		<section class="wrapper">
		<div class="form-w3layouts">
	        <!-- page start-->
	        <!-- page start-->
	        <div class="row">
	            <div class="col-lg-12">
	                    <section class="panel">
	                        <header class="panel-heading">
	                            Tambah Calon
	                        </header>
	                        <div class="panel-body">
	                            <div class="position-center">
	                                <form role="form" action="" method="POST" enctype="multipart/form-data">
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1">Nama Calon</label>
	                                    <input type="text" name="nama_calon" class="form-control" id="exampleInputPassword1" placeholder="Password">
	                                </div>
																	<div class="form-group">
	                                    <label for="exampleInputPassword1">Visi dan Misi</label>
																			<textarea rows="8" cols="80" name="visi_misi"></textarea required>
	                                </div>
																	<div class="form-group">
																		<label for="exampleInputFile">Foto Calon</label>
																		<input name="gambar" type="file" id="exampleInputFile" accept="image/*" required>
	                                </div>

	                                <button type="submit" name="tambah_calon" class="btn btn-info">Tambah</button>
	                            </form>
	                            </div>

	                        </div>
	                    </section>
										</div>
									</div>
			</div>
		</section>

<?php include_once '../../layout/footer.php'; ?>
