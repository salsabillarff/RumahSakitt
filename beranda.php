
<div class="container mb-5">
	<span><h1>Jadwal Dokter</h1></span></br>
    <div class="row">
		<?php
		require_once('koneksi.php');
		$query = $koneksi->query("SELECT * FROM dokter ");

		if($query->num_rows > 0){
			while($data = mysqli_fetch_object($query)){ // Memperbarui data pada setiap iterasi
		?>
				<div class="col-md-4">
					<div class="card">
						<img src="../rumahsakit/admin/dokter/image/<?= $data->foto_dokter ?>" class="card-img-top" alt="Foto Dokter" style="max-width:500px; height:auto;">
						<div class="card-body">
							<h5 class="card-title"><?= $data->nama_dokter ?></h5> <!-- Menampilkan nama dokter -->
							<p class="card-text">Spesialisasi: <?= $data->type_dokter ?></p> <!-- Menampilkan spesialisasi dokter -->
							<p class="card-text">Jadwal Dokter: <?= $data->jadwal_dokter ?></p>
							<?php 
							$status_text = $data->status == 1 ? 'Tersedia' : 'Off'; // Tentukan teks berdasarkan status
							$status_color = $data->status == 1 ? 'text-success' : 'text-danger'; // Tentukan warna teks berdasarkan status
							?>
							<span>Status:<span class="card-text <?= $status_color ?>"> <?= $status_text ?></span></span>
						</div>
					</div>
				</div>
		<?php 
			}
		} else {
			echo "Data tidak tersedia";
			die();
		}
		?>

    </div>
</div>