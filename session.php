<?php

	session_start();
	
	require_once 'function/function.php';
	$session = new ADMIN();
	
	// if user session is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
	// put this file within secured pages that users (users can't access without login)
	
	if(!$session->is_loggedinAdmin())
	{
		// session no set redirects to login page
		$session->redirect('../../login.php');
	}