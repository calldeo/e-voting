<?php
	date_default_timezone_set("Asia/Bangkok");

	require_once("../../session.php");
	require_once("../../function/function.php");
	$admin = new ADMIN();

	$id_user = $_SESSION['admin_session'];

	$stmt = $admin->runQuery("SELECT * FROM users WHERE id_user=:id_user");
	$stmt->execute(array(":id_user"=>$id_user));
	$dataUser=$stmt->fetch(PDO::FETCH_ASSOC);

	$stmt = $admin->runQuery("SELECT * FROM setting_waktu WHERE id_setting=1");  
    $stmt->execute();
              
    if($stmt->rowCount()>0)
   	{
     	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
     		$_SESSION['tgl_vote'] = $row['waktu'];
        }
    }
?>
