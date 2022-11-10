<?php
$page = "voted";
include_once '../../layout/cek_id.php';
include_once '../../layout/cek_hakAkses.php';
include_once '../../layout/header.php';

if(isset($_GET['id_user'])){
	$id = $_GET['id_user'];

	if($admin->DeleteVoted($id)){
		?>
		<script type="text/javascript">
			$( document ).ready(function() {
				swal({title: "Selamat!", text: "Selamat anda berhasil Menghapus!", type: "success"},
					function(){
						document.location='../voted/'
					}
				);
			});
		</script>
		<?php
	}else {
		?>
		<script type="text/javascript">
	      $( document ).ready(function() {
	        swal({title: "Maaf!", text: "Gagal Menghapus!", type: "error"},
	          function(){
	            document.location=''
	          }
	        );
	      });
	    </script>
		<?php
	}
}

?>
