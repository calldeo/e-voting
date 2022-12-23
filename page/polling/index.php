<?php
$page='polling';

include_once '../../layout/cek_id.php';
include_once '../../layout/header.php';
include_once '../../layout/navigation.php';
?>
<section id="main-content">
	<section class=" wrapper">
		<div class="agile-grid">
		<h2 style="text-align:center;margin-bottom:20px;">HASIL QUICK COUNT PEMILIHAN KETUA OSIS</h2>
    		<div class="row" id="load_data">
			
			</div>
		</div>
</section>
<?php
	include_once '../../layout/footer.php';
?>

<script>
$(document).ready(function(){
 setInterval(function(){//setInterval() method execute on every interval until called clearInterval()
  $('#load_data').load("../polling/fetch.php").fadeIn("slow");
  //load() method fetch data from fetch.php page
 }, 1000);
 
});
</script>