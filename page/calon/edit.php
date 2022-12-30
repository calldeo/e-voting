<?php
	$page='calon';
	include_once '../../layout/cek_id.php';
	include_once '../../layout/cek_hakAkses.php';
	include_once '../../layout/header.php';

	if(isset($_GET['id_calon'])&&!empty($_GET['id_calon']))
  {
    $id_calon = $_GET['id_calon'];
    
    $stmt_eidt=$admin->runQuery('SELECT * FROM calon_osis WHERE id_calon=:id_calon');
      $stmt_eidt->execute(array(':id_calon'=>$id_calon));
      $edit_row=$stmt_eidt->fetch(PDO::FETCH_ASSOC);
      extract($edit_row);
  }

  if(isset($_POST['btn-update']))
  {
    $id_calon = $_GET['id_calon'];
    $nama_calon = $_POST['nama_calon'];
    $visimisi = $_POST['visimisi'];

    $images=$_FILES['gambar']['name'];
    $tmp_dir=$_FILES['gambar']['tmp_name'];
    $imageSize=$_FILES['gambar']['size'];

    if($images)
  	{
	    $upload_dir='../../assets/foto_calon/';
	    $imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
	    $valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
	    $file=rand(1000, 1000000).".".$imgExt;

	    if(in_array($imgExt, $valid_extensions))
	   	{   
	    	if($imageSize < 5000000)
		    {
		    	if (file_exists($upload_dir.$edit_row['gambar'])) {
		    		unlink($upload_dir.$edit_row['gambar']);
		    	}
		     	move_uploaded_file($tmp_dir,$upload_dir.$file);
		    }
		    else
		    {
		     	$errMSG = "Sorry, your file is too large it should be less then 5MB";
		    }
	   	}
	   	else
	   	{
	    	$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
	   	} 
  	}
  	else
  	{
   		// if no image selected the old image remain as it is.
   		$file = $edit_row['gambar']; // old image from database
  	}

    if (!isset($errMSG)) 
    {
	    if($admin->UpdateCalon($id_calon, $nama_calon, $visimisi, $file))
	    {
	        ?>
	        <script type="text/javascript">
	        $( document ).ready(function() {
	          swal({title: "Selamat!", text: "Data berhasil diedit!", type: "success"},
	            function(){ 
	              document.location='index.php'
	            }
	          );
	        });
	      </script>
	    <?php
	    }else 

	    {
	      ?>
	      <script type="text/javascript">
	        $( document ).ready(function() {
	          swal({title: "Selamat!", text: "Data gagal diedit!", type: "error"},
	            function(){ 
	              document.location='index.php'
	            }
	          );
	        });
	      </script>
	      <?php
	    }
	} else
	{
		?>
	      <script type="text/javascript">
	        $( document ).ready(function() {
	          swal({title: "Selamat!", text: "Data gagal diedit!", type: "error"},
	            function(){ 
	              document.location='index.php'
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
	                            Edit Calon
	                        </header>
	                        <div class="panel-body">
	                          <div class="position-center">
	                                <form role="form" action="" method="POST" enctype="multipart/form-data">
	                                <div class="form-group">
	                                    <label for="exampleInputPassword1">Nama Calon</label>
	                                    <input type="text" value="<?php echo $nama_calon?>" name="nama_calon" class="form-control" id="exampleInputPassword1" placeholder="Password" required onkeyup="lettersOnly(this)">
	                                </div>
									<div class="form-group">
	                                    <label for="exampleInputPassword1">Visi dan Misi</label>
										<textarea rows="8" cols="80" name="visimisi" required class="textarea"> <?php echo $visimisi?> </textarea>
	                                </div >
									<div class="form-group">
										<label for="exampleInputFile">Foto Calon</label><br>
										<img class="img-rounded" width="150px" src="../../assets/foto_calon/<?php echo $gambar?>" alt="">
										<input name="gambar" type="file"  accept="image/*" required>
	                </div>

	                                <input type="submit" name="btn-update" class="btn btn-info" value="Edit"></input>
	                            </form>
	                            </div>

	                        </div>
	                    </section>
										</div>
									</div>
			</div>
		</section>
<script >function lettersOnly(input) {
    var regex = /[^a-z ]/gi;
    input.value = input.value.replace(regex, "");
		}
    </script>

<?php include_once '../../layout/footer.php'; ?>
