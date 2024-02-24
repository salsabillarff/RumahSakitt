<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		form, table{
	border: 3px solid #f1f1f1;
	background-color: white;
	/*font-family: arial;*/
	font-size: 15px;
	padding: 10px;
	border-radius: 30px;
}
	</style>
</head>
<body>

</body>
</html><?php
	/*Skrip ini tidak menggunakan OOP
	/*Memanggil file koneksi hanya satu kali*/
	require_once('koneksi.php');

	$query 	= "SELECT * FROM kritik_saran";
	$link 	= "index.php?lihat=kritik_saran/";
?>

<div class="row">
	<div class="col-lg-12">
		<h3 class = "text-primary">Kritik dan Saran</h3>
		<hr style = "border-top:1px dotted #000;"/>
		<!-- Tombol Tambah -->

		<!-- Menampilkan Tabel -->
		<div class="box-body table-responsive no-padding">
		<table class="table table-hover table-bordered" style="margin-top: 10px">
			<tr class="info">
				<th>No</th>
				<th>Kritik dan Saran</th>
				<th>Date</th>
			</tr>
			
			<?php
			if($data = mysqli_query($koneksi,$query)){
				$no=1;
				while($tampil = mysqli_fetch_object($data)){
				?>

					<tr>
						<td><?= $no ?></td>
						<td><?= $tampil->kritik_saran ?></td>
						<td><?= $tampil->created_date?></td>
					</tr>
				
				<?php
					$no++;
				}//Tutup while
			}//Tutup if
			?>

		</table>
		</div><!-- .table-responsive -->
	</div>
</div>