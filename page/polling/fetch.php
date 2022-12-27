<?php
	include_once '../../layout/cek_id.php';

	$NUM = $admin->runQuery("SELECT COUNT(id_user) as jumlah FROM hasil_voting");
	$NUM->execute();
	$NUMS=$NUM->fetch(PDO::FETCH_ASSOC); $masuk = $NUMS['jumlah'];

	$stmt = $admin->runQuery("SELECT calon_osis.id_calon, calon_osis.gambar, calon_osis.nama_calon, COUNT(hasil_voting.id_user) as jumlah_vote FROM calon_osis LEFT JOIN hasil_voting ON calon_osis.id_calon = hasil_voting.id_calon GROUP BY calon_osis.id_calon");
	$stmt->execute();

	$query = $admin->runQuery("SELECT COUNT(nama) as jumlah_user FROM users");
    $query->execute(); $user = $query->fetch(); $total = $user['jumlah_user'];

			if($stmt->rowCount()>0){
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	?>
			<div class="col-lg-3">
			<img class="img-rounded" width="100%" src="../../assets/foto_calon/<?php echo $row['gambar']?>" alt="">
				<br><br>
				<h4 style="text-align:center;"><?php echo $row['nama_calon']?></h4>
				<div class="progress progress-striped active" style="height:15px;">
					<?php if($row['jumlah_vote'] == 0 && $masuk == 0){$width =0;}else{$width = ($row['jumlah_vote']/$masuk)*100;} ?>
					<div class="bar light-blue" style="width:<?= $width?>%;height:15px;text-align:center;"><?= round($width);?>%</div>
				</div>
		</div>
		<?php } } ?>
	</div><br>
		<div class="row">
			<div class="col-lg-12">
				<h4 style="text-align:center;margin-bottom:-10px;margin-top:-10px;"> Persentase Data Masuk </h4>
				<div class="progress progress-striped active" style="height:15px;margin: 0px 10px;margin-top:20px;">
					<div class="bar light-blue" style="width:<?=($masuk/$total)*100;?>%;height:15px;text-align:center;"><?=round(($masuk/$total)*100);?>%</div>
				</div>

				 <div class="col-xs-12" style="padding-top: 5px;">
        		<a class="btn btn-warning pull-right" href="cetak.php">Print Data</a>
        		<br><br>
      			</div>

				<br>
				<div class="" style="padding: 0 10px;">
					<table class="table table-striped b-t b-light" id="dataTable">
		        <thead>
							<tr>
		            <th style="text-align:center;background:rgb(176, 179, 174);color:black;">No Urut</th>
		            <th style="text-align:center;background:rgb(176, 179, 174);color:black;">Nama Calon</th>
								<th style="text-align:center;background:rgb(176, 179, 174);color:black;">Jumlah</th>
		          </tr>
		        </thead>
						 <tbody>
						<?php
						//TRUNCATE TABLE nama tabel
						// mysql_num_rows($query)
						// $stm = $admin->runQuery("SELECT * FROM calon_osis ORDER BY id_calon ASC");
						$stm = $admin->runQuery("SELECT calon_osis.id_calon , calon_osis.nama_calon ,COUNT(id_user) as jumlah_vote FROM calon_osis LEFT JOIN hasil_voting ON calon_osis.id_calon = hasil_voting.id_calon GROUP BY calon_osis.id_calon");
						$stm->execute();
						if($stm->rowCount()>0){
								while($rows=$stm->fetch(PDO::FETCH_ASSOC)){
						 ?>
							<tr>
		            <th style="text-align:center;color:black;background:#f9f9f9;"> <?= $rows['id_calon'] ?></th>
								<th style="text-align:center;color:black;background:#f9f9f9;"> <?= $rows['nama_calon'] ?></th>
		            <th style="text-align:center;color:black;background:#f9f9f9;"><?= $rows['jumlah_vote'] ?></th>
		          </tr>
						<?php }} ?>
		        </tbody>
		      </table>
				</div>