<?php
 	$page = "user";
	include_once '../../layout/cek_id.php';
	include_once '../../layout/header.php';

	if(isset($_POST['import'])){ // Jika user mengklik tombol Import
		$nama_file_baru = 'data_user.xlsx';
		
		// Load librari PHPExcel nya
		require_once 'PHPExcel/PHPExcel.php';

	    if(isset( $_POST["drop"] )){
	//             kosongkan tabel user
	    	 	$admin->deleteAllCount();
	            $admin->deleteAllUser();
	           
	    };
		
		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat query Insert
		// $sql = $admin->runQuery("TRUNCATE TABLE hasil_voting");
		$sql = $admin->runQuery("INSERT INTO users (id_user, nama, username, password, akses) VALUES(:id_user,:nama,:username,:password,:akses)");
		
		
		$numrow = 1;
		foreach($sheet as $row){
			// Ambil data pada excel sesuai Kolom
			$id_user 	= $row['A']; // Ambil data NUPTK
            $nama 		= $row['B']; // Ambil data nama
            $username 	= $row['C']; // Ambil data username
            $password 	= $row['D']; // Ambil data password
            $akses 		= $row['E']; // Ambil data akses
			
			// Cek jika semua data tidak diisi
			if(empty($id_user) && empty($nama) && empty($username) && empty($password) && empty($akses))
				continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
			
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				$p = md5($password);
				// Proses simpan ke Database
				$sql->bindParam(':id_user', $id_user);
				$sql->bindParam(':nama', $nama);
				$sql->bindParam(':username', $username);
				$sql->bindParam(':password', $p);
				$sql->bindParam(':akses', $akses);
				$sql->execute(); // Eksekusi query insert
				
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}
?>
		<script type="text/javascript">
		$( document ).ready(function() {
			swal({title: "Selamat!", text: "Data berhasil di import", type: "success"},
				function(){
					document.location='../user'
				}
			);
		});
	</script>
<?php
	}
?>