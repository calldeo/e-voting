<?php
	$page='calon';

	include_once '../../layout/cek_id.php';
	include_once '../../layout/cek_hakAkses.php';
	include_once '../../layout/header.php';
	include_once '../../layout/navigation.php';
?>
<section id="main-content">
	<section class=" wrapper">
		<div class="agile-grid">
		<h2 class="w3ls_head">Data Calon Ketua Osis</h2>
      <div class="row" style="margin-bottom: 20px;margin-top: -35px;">
          <div class="col-lg-12"> <a class="btn btn-sm btn-primary" href="tambah.php">Tambah</a> </div>
      </div>
			<div class="row">
			<?php
			$stmt = $admin->runQuery("SELECT * FROM calon_osis");
			$stmt->execute();

			if($stmt->rowCount()>0){
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	?>
			<div class="col-lg-3">
			<img class="img-rounded" width="100%" src="../../assets/foto_calon/<?php echo $row['gambar']?>" alt="">
				<br><br>
				<center>

				<h4><?php echo $row['nama_calon']?></h4>
				<br>
				
				<a href="#myModal<?php echo $row['id_calon']?>" data-toggle="modal" class="btn btn-success"> Visi Misi</a>
				<a href="edit.php?id_calon=<?=$row['id_calon']?>" class="btn btn-primary"> Edit </a>
				<a href="hapus.php?id_calon=<?=$row['id_calon']?>" class="btn btn-danger"> Hapus</a>
				<br><br>

				</center>
				<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal<?php echo $row['id_calon']?>" class="modal fade">
				<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">
										<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
										<h4 class="modal-title" align="center"><b><?php echo $row['nama_calon']?></b></h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-lg-4">
											<img class="img-rounded" width="100%" src="../../assets/foto_calon/<?php echo $row['gambar']?>" alt="">
										</div>
										<div class="col-lg-8">
												<?php  echo $row['visimisi']?>
												<style type="text/css">;
									    h3 {font-family:  Cambria,"Times New Roman",serif}
									    p { font-family:  Cambria,"Times New Roman",serif }
									</style>
										</div>
									</div>
								</div>
						</div>
				</div>
			</div>
		</div>
		<?php
					}
			}else{
			?>  <tr>  <td>Nothing here...</td> </tr>
			<?php
		}
			 ?>

		 </div>
	 </div>
</section>
<?php
	include_once '../../layout/footer.php';
?>
