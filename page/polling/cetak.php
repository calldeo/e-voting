<?php
$page='polling';

	include_once '../../layout/cek_id.php';
	
	include_once '../../layout/header.php';
	

	$NUM = $admin->runQuery("SELECT SUM(jumlah_vote) FROM calon_osis");
	$NUM->execute();
	$NUMS=$NUM->fetch(PDO::FETCH_ASSOC); $masuk = $NUMS['SUM(jumlah_vote)'];

	$stmt = $admin->runQuery("SELECT * FROM calon_osis");
	$stmt->execute();

	$query = $admin->runQuery("SELECT COUNT(nama) as jumlah_user FROM users");
    $query->execute(); $user = $query->fetch(); $total = $user['jumlah_user'];

			if($stmt->rowCount()>0){
					while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
	?>
			
		</div>
		<?php } } ?>
	</div><br>




<td rowspan="">
                <img src="../../assets/logo/surat tugas.jpeg" width="100%" />
            </td>
	<table border="1" width="100%">
		<tr> 
			  <th bgcolor="yellow" >NO</th>
			<th bgcolor="yellow">Nama Calon</th>
			<th bgcolor="yellow">Jumlah Vote</th>
		</tr>
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
		<script>
		window.print();
	</script> 
		
		<!-- <section id="main-content">
	<section class=" wrapper">
		<div class="col-lg-10 ">
		<h3 style="text-align:center;margin-bottom:10px;">HASIL QUICK COUNT PEMILIHAN KETUA OSIS</h3>
    		<div class="row" id="load_data">
			
			</div>
		</div>
		</section>
      			</div>

				<br>
				<div class="col-xs-10"style="padding: 0 100px;">
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
						$stm = $admin->runQuery("SELECT calon_osis.id_calon , calon_osis.nama_calon ,COUNT(id_user) as jumlah_vote FROM hasil_voting INNER JOIN calon_osis ON calon_osis.id_calon = hasil_voting.id_calon GROUP BY hasil_voting.id_calon");
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
			<script>
		window.print();
	</script> -->