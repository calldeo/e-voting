<link rel="stylesheet" type="text/css" id="theme" href="assets/css/alert/sweetalert.css"/>
  <script type="text/javascript" src="assets/js/alert/jquery-1.9.1.min.js"></script>        
  <script type="text/javascript" src="assets/js/alert/sweetalert-dev.js"></script>
<?php
  session_start();
  require_once("function/function.php");
  $admin = new ADMIN();

  if($admin->is_loggedinAdmin()!="")
  {
      $admin->redirect('home.php');
  }

  if(isset($_POST['btn-login']))
  {
      $username = strip_tags($_POST['username']);
      $password = strip_tags($_POST['password']);
          
      if($admin->doLoginAdmin($username,$password))
      {
		  $id_user = $_SESSION['admin_session'];

			$stmt = $admin->runQuery("SELECT * FROM users WHERE id_user=:id_user");
			$stmt->execute(array(":id_user"=>$id_user));
			$dataUser=$stmt->fetch(PDO::FETCH_ASSOC);
?>
      <script type="text/javascript">
        $( document ).ready(function() {
          swal({title: "Selamat <?php echo $dataUser['nama'] ?>!", text: "Anda berhasil login!", type: "success"},
            function(){ 
              document.location='page/dashboard/'
            }
          );
        });
      </script>
<?php
      }
      else
      {
?>
  <script type="text/javascript">
      $( document ).ready(function() {
        swal({title: "Maaf!", text: "Username dan Password yang anda masukkan salah!", type: "error"},
          function(){ 
            document.location='login.php'
          }
        );
      });
    </script>
<?php
      }   
  }
?>
