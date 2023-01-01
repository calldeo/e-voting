<?php
$page = "user";
include_once '../../layout/cek_id.php';
include_once '../../layout/cek_hakAkses.php';
include_once '../../layout/header.php';

if(isset($_POST['tambah'])){
	$nama = $_POST['nama'];
	$username = $_POST['user'];
	$password = md5($_POST['pass']);
	$akses  = "2";

	if($admin->TambahtUser($nama,$username,$password, $akses)){ ?>
	<script type="text/javascript">
		$( document ).ready(function() {
			swal({title: "Selamat!", text: "Berhasil Menambahkan Data Baru", type: "success"},
				function(){
					document.location='../user'
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
                            Import Data Pemilih
                        </header>
                        <div class="panel-body">
                                <form method="post" action="" enctype="multipart/form-data">
					              <div class="box-body">
					                <!-- Input -->
					                <div class="form-group">
					                  <a href="download/Format_datauser.xlsx" class="btn btn-default">
					                    <span class="glyphicon glyphicon-download"></span>
					                    Download Format
					                  </a>
					                </div>
					              </div>
					            
					            <!-- 
					            -- Buat sebuah input type file
					            -- class pull-left berfungsi agar file input berada di sebelah kiri
					            -->
					              <div class="box-body">
					                <!-- Input -->
					                <div class="form-group">
					                  <input type="file" name="file" class="pull-left">
					                <br><br>
					                  <button type="submit" name="preview" class="btn btn-success btn-sm">
					                    <span class="glyphicon glyphicon-eye-open"></span> Preview
					                  </button>
					                </div>
					              </div>
					            </form>
					            <hr>
          
          <!-- Buat Preview Data -->
          <?php
          // Jika user telah mengklik tombol Preview
          if(isset($_POST['preview'])){
            //$ip = ; // Ambil IP Address dari User
            $nama_file_baru = 'data_user.xlsx';
            
            // Cek apakah terdapat file data.xlsx pada folder tmp
            if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
              unlink('tmp/'.$nama_file_baru); // Hapus file tersebut
            
            $tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
            $tmp_file = $_FILES['file']['tmp_name'];
            
            // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
            if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
              // Upload file yang dipilih ke folder tmp
              // dan rename file tersebut menjadi data{ip_address}.xlsx
              // {ip_address} diganti jadi ip address user yang ada di variabel $ip
              // Contoh nama file setelah di rename : data127.0.0.1.xlsx
              move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);
              
              // Load librari PHPExcel nya
              require_once 'PHPExcel/PHPExcel.php';
              
              $excelreader = new PHPExcel_Reader_Excel2007();
              $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
              $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
              
              // Buat sebuah tag form untuk proses import data ke database
              echo "<form method='post' action='import_database.php'>";
              
              // Buat sebuah div untuk alert validasi kosong
              echo "
                <div class='box-body'>
                  <div class='table-responsive'>
                    <table class='table table-striped b-t b-light' id='dataTables-example'>
                      <thead>
                        <tr>
                          <th>NISN/NIP.</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Hak Akses</th>
                        </tr>
                      </thead>
					  <tbody>";
              
              $numrow = 1;
              $kosong = 0;
              foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
                // Ambil data pada excel sesuai Kolom
                $id_user = $row['A']; // Ambil data NUPTK
                $nama = $row['B']; // Ambil data nama
                $username = $row['C']; // Ambil data username
                $password = $row['D']; // Ambil data password
                $akses = $row['E']; // Ambil data akses
                
                // Cek jika semua data tidak diisi
                if(empty($id_user) && empty($nama) && empty($username) && empty($password) && empty($akses))
                  continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                
                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if($numrow > 1){
                  // Validasi apakah semua data telah diisi
                  $id_user_td = ( ! empty($id_user))? "" : " style='background: #E07171;'"; // Jika id_user kosong, beri warna merah
                  $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika nama kosong, beri warna merah
                  $username_td = ( ! empty($username))? "" : " style='background: #E07171;'"; // Jika username kosong, beri warna merah
                  $password_td = ( ! empty($password))? "" : " style='background: #E07171;'"; // Jika password kosong, beri warna merah
                  $akses_td = ( ! empty($akses))? "" : " style='background: #E07171;'"; // Jika hak akses kosong, beri warna merah
                  
                  // Jika salah satu data ada yang kosong
                  if(empty($id_user) or empty($nama) or empty($username) or empty($password) or empty($akses)){
                    $kosong++; // Tambah 1 variabel $kosong
                  }
                  
                  echo "<tr>";
                  echo "<td".$id_user_td.">".$id_user."</td>";
                  echo "<td".$nama_td.">".$nama."</td>";
                  echo "<td".$username_td.">".$username."</td>";
                  echo "<td".$password_td.">".$password."</td>";
                  echo "<td".$akses_td.">".$akses."</td>";
                  echo "</tr>";
                }
                
                $numrow++; // Tambah 1 setiap kali looping
              }
              
              echo "</tbody>
              		</table>
                  </div>
                </div>";
              
              // Cek apakah variabel kosong lebih dari 1
              // Jika lebih dari 1, berarti ada data yang masih kosong
              if($kosong > 1){
              ?>  
                <script>
                $(document).ready(function(){
                  // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                  $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                  
                  $("#kosong").show(); // Munculkan alert validasi kosong
                });
                </script>
              <?php
              }else{ // Jika semua data sudah diisi
                echo "<hr>";

                echo '
                <div class="box-body">
                  <!-- Input -->
                  <div class="form-group">';
                echo '<label><input type="checkbox"  name="drop" value="1"  /> <font color="red" ><i>Hapus seluruh data terlebih dahulu* </i></font> </label>';
                echo "</div>
                  </div>";
                
                echo '
                <div class="box-body">
                  <!-- Input -->
                  <div class="form-group">';
                // Buat sebuah tombol untuk mengimport data ke database
                echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
                echo "</div>
                  </div>";
              }
              
              echo "</form>";
            }else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
              // Munculkan pesan validasi
              echo '
                <div class="box-body">
                  <!-- Input -->
                  <div class="form-group">';
              echo "<div class='alert alert-danger'>
              Hanya File Excel 2007 (.xlsx) yang diperbolehkan
              </div>";
              echo "</div>
                  </div>";
            }
          }
          ?>
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
