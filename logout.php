<?php
	require_once('session.php');
	require_once('function/function.php');
	$admin = new ADMIN();
	
	if($admin->is_loggedinAdmin()!="")
	{
		$admin->redirect('login.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$admin->doLogoutAdmin();
		$admin->redirect('login.php');
	}
