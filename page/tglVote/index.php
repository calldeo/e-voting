<?php
$page = "tanggal vote";
include_once '../../layout/cek_id.php';
include_once '../../layout/cek_hakAkses.php';
include_once '../../layout/header.php';

if(isset($_POST['btn-setWaktu'])){
	$data       = [
	        'waktu'				=> $_POST['waktu'],
	        'id_setting'		=> 1,
	    ];

	if($admin->tglVote($data)){ 
		$_SESSION['tgl_vote'] = $_POST['waktu'];
		?>
	<script type="text/javascript">
		$( document ).ready(function() {
			swal({title: "Selamat!", text: "Berhasil mengupdate setting waktu", type: "success"},
				function(){
					document.location='index.php'
				}
			);
		});
	</script>
	<?php
	}else { ?>
			<script type="text/javascript">
			  $( document ).ready(function() {
				swal({title: "Maaf!", text: "Gagal mengupdate setting waktu", type: "error"},
				  function(){
					document.location='index.php'
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
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Setting Waktu Vote
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-12">
        <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th style="width:20px;">ID Waktu</th>
                <th>Waktu</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
			<?php
              	$stmt = $admin->runQuery("SELECT * FROM setting_waktu");  
                $stmt->execute();
              
                if($stmt->rowCount()>0)
                {
                  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                  {
                    ?>
                <tr>
                  <td><?php print($row['id_setting']); ?></td>
                  <td><?php print($row['waktu']); ?></td>
                  <td><button type="button" class="btn btn-danger btn-sm" role="button" aria-pressed="true" data-toggle="modal" data-target="#updateSetWaktu<?php print($row['id_setting']); ?>">
                        <i class="fa fa-calendar"> <span>&nbsp; Ganti Waktu</span></i>
                      </button></td>
				</tr>
				
				<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="updateSetWaktu<?php echo $row['id_setting']?>" class="modal fade">
				<div class="modal-dialog">
						<div class="modal-content">
								<div class="modal-header">
										<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
										<h4 class="modal-title" align="center"><b>Setting Waktu</b></h4>
								</div>
								<div class="modal-body">
                            			<div class="position-center">
											<div class="row">
												<form role="form" action="" method="POST">
													<div class="form-group">
														<input type="date" name="waktu" value="<?php echo $row['waktu']?>" class="form-control">
													</div>
													<button type="submit" name="btn-setWaktu" class="btn btn-primary">Set Waktu</button>
												</form>
											</div>
										</div>
								</div>
						</div>
				</div>
			</div>
			<?php
				  }
				}
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
