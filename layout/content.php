<?php
$NUM = $admin->runQuery("SELECT COUNT(id_user) AS jumlah_vote FROM hasil_voting");
$NUM->execute();
$NUMS=$NUM->fetch(PDO::FETCH_ASSOC); $masuk = $NUMS['jumlah_vote'];

$stmt = $admin->runQuery("SELECT * FROM calon_osis");
$stmt->execute();

$query = $admin->runQuery("SELECT COUNT(nama) as jumlah_user FROM users WHERE akses!=1");
$query->execute(); $user = $query->fetch(); $total = $user['jumlah_user'];
?>

<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<div class="col-xs-6 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-xs-4 market-update-right">
						<i class="fa fa-users" ></i>
					</div>
					<div class="col-xs-8 market-update-left">
					<h4>Sudah Memilih</h4>
						<h3><?= $masuk ?></h3>
						<p>orang</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-xs-6 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-xs-4 market-update-right">
						<i class="fa fa-users"></i>
					</div>
					<div class="col-xs-8 market-update-left">
						<h4>Belum memilih</h4>
						<h3><?= $total-$masuk?></h3>
						<p>orang</p>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
		   <div class="clearfix"> </div>
		</div>
		<!-- //market-->
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12">
					<!--agileinfo-grap-->
						<div class="agileinfo-grap">
							<div class="agileits-box">
								<header class="agileits-box-header clearfix">
									<h3>
										E-VOTE KANETA

									</h3>

								</header>
								<div class="agileits-box-body clearfix">
									<br>
									<p align="center">
										<img src="../../assets/logo/kaneta
										.png" width="20%" alt="SMK Negeri 1 Tapen">
									</p>
									<br><br>
									<p align="center">
										E-VOTE adalah sebuah Sistem Informasi yang bertujuan untuk memfasilitasi Kegiatan Sekolah
										 untuk mencari calon Ketua OSIS di SMK Negeri 1 Tapen Tahun Periode 2022/2023.
									</p>
									<style type="text/css">;
									    h3 {font-family:  Cambria,"Times New Roman",serif}
									    p { font-family:  Cambria,"Times New Roman",serif }
									</style>
								</div>
							</div>
						</div>
	<!--//agileinfo-grap-->

				</div>
			</div>
		</div>
	</section>
