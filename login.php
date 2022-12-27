<?php
  session_start();
  require_once("function/function.php");
  $admin = new ADMIN();

  if($admin->is_loggedinAdmin() != "")
  {
      $admin->redirect('page/dashboard/');
  }

?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>
        <!-- META SECTION -->
        <title>Login | E-VOTE KANETA</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="shortcut icon" href="assets/logo2.png">
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="assets/css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->

        <link rel="stylesheet" href="assets/css/bubble-style.css">
    </head>
    <body style="background:#f5f5f5;">

        <div class="login-container">

            <div class="login-box animated fadeInDown">
                <center>
                    <img src="assets/kaneta.png" width="150" height="150"><br/><br/>
                </center>
                <div class="login-body">
					<div class="login-title" align="center"><strong>Selamat Datang di E-VOTE</strong><br>Silahkan Login</div>
                    <form action="auth.php" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Username" name="username" required />

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name=password required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button class="btn btn-info btn-block" type="submit" name="btn-login">Masuk</button>

                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; <?php echo date('Y') ?> smkn1tapen.sch.id</div>
                </div>
            </div>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

            <ul class="bg-bubbles"  style="position:relative;">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>

        </div>

    </body>
</html>
