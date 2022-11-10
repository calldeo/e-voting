<?php
	include_once 'cek_id.php';

	if($dataUser['akses'] != 1){
	  $admin->redirect('../../page/dashboard/');
	}

?>
