<?php
$page='vote';

include_once '../../layout/cek_id.php';
include_once '../../layout/header.php';

	if(isset($_POST['btn-vote']))
	{
		if($_POST['vote'] == ""){
			?>
					<script type="text/javascript">
				      $( document ).ready(function() {
				        swal({title: "Maaf!", text: "Tolong pilih calon yang akan anda vote", type: "error"},
				          function(){
				            document.location=''
				          }
				        );
				      });
				    </script>
		<?php
		}
		else
		{
			$id_user 	= $dataUser['id_user'];
			$id_calon 	= $_POST['vote'];

			if($admin->TambahVote($id_user,$id_calon))
			{ 
		?>
				<script type="text/javascript">
					$( document ).ready(function() {
						swal({title: "Terima kasih!", text: "Terima kasih telah memilih dengan benar", type: "success"},
							function(){
								document.location='../../logout.php?logout=true'
							}
						);
					});
				</script>
		<?php
			}
			else
			{ 
		?>
				<script type="text/javascript">
			      $( document ).ready(function() {
			        swal({title: "Maaf!", text: "Anda sudah pernah menginput! 1 Akun hanya dapat menginput pemilihan sebanyak 1 Kali", type: "error"},
			          function(){
			            document.location=''
			          }
			        );
			      });
			    </script>
	<?php
			}
		}
	}
	$page='vote';
	include_once '../../layout/navigation.php';
?>
<section id="main-content">
	<section class=" wrapper">
		<div class="agile-grid">
		<h2 class="w3ls_head" style="text-align:center;margin-bottom:20px;">Calon Ketua Osis SMKN 1 TAPEN</h2>
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
				<h4 style="text-align:center;"><?php echo $row['nama_calon']?></h4>
				<a  style="width:100%;margin-top:10px;"href="#myModal<?php echo $row['id_calon']?>" data-toggle="modal" class="btn btn-success"> Visi Misi 	</a>
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
												<?= $row['visimisi']?>
										</div>
									</div>
								</div>
						</div>
				</div>
			</div>
			<br><br>
		</div>
		<?php
					}
			}else{
			?>  <tr>  <td>Nothing here...</td> </tr>
			<?php
		}
			 ?>

		 </div>
     <hr>
		 <form role="form" action="" method="POST">
     <select class="form-control m-bot15" name="vote">
			 <option value="">--Pilih Salah Satu--</option>
			 <?php
		 			$stmt = $admin->runQuery("SELECT * FROM calon_osis");
		 			$stmt->execute();

		 			if($stmt->rowCount()>0){
		 					while($rows=$stmt->fetch(PDO::FETCH_ASSOC)){
		 	?>
         <option value="<?= $rows['id_calon']; ?>"><?= $rows['nama_calon']; ?></option>
      <?php }} ?>
     </select>
		 <br>
		 <input type="submit" class="btn btn-primary" name="btn-vote" value="Vote" style="margin: 0 auto;display:block;width:200px;">
	 </form>
	 </div>
</section>
<?php
	include_once '../../layout/footer.php';
?>
