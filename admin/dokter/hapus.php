<?php
	require_once('koneksi.php');
	
	try {
		$sql = "DELETE FROM dokter WHERE id=".$_GET['id'];
		
		$koneksi->query($sql);
	} 

	catch (Exception $error) {
		echo $error;
		die();
	}

  	echo "<script>
			window.location.href='index.php?lihat=dokter/index';
	</script>";
?>