
<?php
    $date=getdate();
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
    <head>
      <script src="../../assets/tinymce/js/tinymce/tinymce.min.js"></script>
      <script>tinymce.init({ selector:'textarea' });</script>

        <title>E-VOTE SMK | <?php echo $page ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="../../assets/logo2.png">
        <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- bootstrap-css -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" >
        <!-- //bootstrap-css -->
        <!-- Custom CSS -->
        <link href="../../assets/css/style.css" rel='stylesheet' type='text/css' />
        <link href="../../assets/css/style-responsive.css" rel="stylesheet"/>
        <!-- font CSS -->
        <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <!-- font-awesome icons -->
        <link rel="stylesheet" href="../../assets/css/font.css" type="text/css"/>
        <link href="../../assets/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="../../assets/css/morris.css" type="text/css"/>
        <!-- calendar -->
        <link rel="stylesheet" href="../../assets/css/monthly.css">
        <!-- //calendar -->
        <!-- //font-awesome icons -->
        <script src="../../assets/js/jquery2.0.3.min.js"></script>
        <script src="../../assets/js/raphael-min.js"></script>
        <script src="../../assets/js/morris.js"></script>
        <link rel="stylesheet" type="text/css" id="theme" href="../../assets/css/alert/sweetalert.css"/>
          <script type="text/javascript" src="../../assets/js/alert/jquery-1.9.1.min.js"></script>
          <script type="text/javascript" src="../../assets/js/alert/sweetalert-dev.js"></script>
        <!-- Datables-->
        <link href="../../assets/css/dataTables.bootstrap.css" rel="stylesheet" />
        <link href="../../assets/css/bootstrap.css" rel="stylesheet" />
        <!-- End Databels-->
          <script src="../../assets/js/jquery-1.11.3-jquery.min.js"></script>
        <!-- //web-fonts -->
    <script type="text/javascript">

    $(document).ready(function(){

     load_data();

     function load_data(query)
     {
      $.ajax({
       url:"fetch_data.php",
       method:"POST",
       data:{query:query},
       success:function(data)
       {
        $('#result').html(data);
       }
      });
     }

     $('#search_text').keyup(function(){
      var search = $(this).val();
      if(search != '')
      {
       load_data(search);
      }
      else
      {
       load_data();
      }
     });
    });
    </script>
    </head>
    <body>
