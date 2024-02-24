<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		form, table{
	border: 3px solid #f1f1f1;
	background-color: white;
	font-family: arial;
	width: 500px;
	margin: auto;
	padding: 20px;
}
	</style>
</head>
<body>

</body>
</html>
<?php
require_once('koneksi.php');
        $query = $koneksi->query("SELECT * FROM dokter WHERE id=".$_GET['id']);

        if($query->num_rows > 0){
            $data = mysqli_fetch_object($query);
        } else {
            echo "Data tidak tersedia";
            die();
        }
?>

<div class="row">
	<div class="col-lg-6">
		<h3 class = "text-primary">Edit Data Dokter</h3>
		<hr style = "border-top:1px dotted #000;"/>
		<form action="" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id_dokter" value="<?= $data->id ?>">
			<div class="form-group">
				<label>Nama Dokter</label>
				<input type="text" value="<?= $data->nama_dokter ?>" class="form-control" name="nama_dokter" required>
			</div>
            <div class="form-group">
                <label>Kode Dokter</label>
                <input type="text" value="<?= $data->kode_dokter ?>" class="form-control" name="kode_dokter" placeholder="Masukan Kode" required>
            </div>
            <div class="form-group">
                <label>Status</label><br>
                <input name="status" type="radio" value="1" <?php if($data->status == 1) echo "checked"; ?>> Tersedia
                <input name="status" type="radio" value="0" <?php if($data->status == 0) echo "checked"; ?>> Off
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Pilih Jadwal</label>
                <select class="form-control" id="jadwal_dokter" name="jadwal_dokter">
                    <option value="00.00 - 08.00 WIB" <?php if($data->jadwal_dokter == '00.00 - 08.00 WIB') echo 'selected'; ?>>00.00 - 08.00 WIB</option>
                    <option value="08.00 - 16.00 WIB" <?php if($data->jadwal_dokter == '08.00 - 16.00 WIB') echo 'selected'; ?>>08.00 - 16.00 WIB</option>
                    <option value="16.00 - 23.59 WIB" <?php if($data->jadwal_dokter == '16.00 - 23.59 WIB') echo 'selected'; ?>>16.00 - 23.59 WIB</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Pilih Type</label>
                <select class="form-control" id="type_dokter" name="type_dokter">
                    <option value="Spesialis" <?php if($data->type_dokter == 'Spesialis') echo 'selected'; ?>>Spesialis</option>
                    <option value="Umum" <?php if($data->type_dokter == 'Umum') echo 'selected'; ?>>Umum</option>
                    <option value="Anak" <?php if($data->type_dokter == 'Anak') echo 'selected'; ?>>Anak</option>
                    <option value="Gigi" <?php if($data->type_dokter == 'Gigi') echo 'selected'; ?>>Gigi</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gambar">Foto Dokter</label>
                <div class="input-group">
                    <input type="file" name="foto_dokter" class="custom-file-input" id="gambar" aria-describedby="inputGroupFileAddon01">
                </div>
                <small id="gambarHelpBlock" class="form-text text-muted">
                Anda dapat mengunggah gambar dalam format JPG, JPEG, PNG, atau GIF.
                </small>
            </div>
			
			<button type="submit" class="btn btn-success">
          		<span class="glyphicon glyphicon-pencil"></span> Ubah
        	</button>
		</form>
	</div>
</div>
<?php 


    if($_POST){
        try {
            // Mendapatkan nama file
            $foto_dokter = $_FILES['foto_dokter']['name'];


            // Lokasi penyimpanan file
            $target = "../rumahsakit/admin/dokter/image/".basename($foto_dokter);

            // Menyimpan data ke database
            $sql = "UPDATE dokter SET kode_dokter='".$_POST['kode_dokter']."', 
                    nama_dokter='".$_POST['nama_dokter']."', 
                    jadwal_dokter='".$_POST['jadwal_dokter']."', 
                    type_dokter='".$_POST['type_dokter']."', 
                    status='".$_POST['status']."', 
                    foto_dokter='$foto_dokter' 
                    WHERE id=".$_POST['id_dokter'];

            //Cek jika query salah
            if(!$koneksi->query($sql)){
                echo $koneksi->error;
                die();
            }

            // Memindahkan file ke folder image
            if (move_uploaded_file($_FILES['foto_dokter']['tmp_name'], $target)) {
                echo "Foto berhasil diunggah.";
            } else {
                echo "Terjadi kesalahan saat mengunggah foto.";
            }
            
        } catch (Exception $error) {
            echo $error;
            die();
        }
        echo "<script>
            window.location.href='index.php?lihat=dokter/index';
          </script>";
    }


?>
