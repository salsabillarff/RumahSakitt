<!DOCTYPE html>
<html>
<head>
    <title>Form Input Dokter</title>
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

<div class="row">
    <div class="col-lg-6">
        <h3 class="text-primary">Tambah Data Pasien</h3>
        <hr style="border-top:1px dotted #000;"/>
        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label>Kode Dokter</label>
                <input type="text" class="form-control" name="kode_dokter" placeholder="Masukan Kode" required>
            </div>
            <div class="form-group">
                <label>Status</label><br>
                <input name="status" type="radio" value="1" > Tersedia
                <input name="status" type="radio" value="0"> Off
            </div>
            <div class="form-group">
                <label>Nama Dokter</label>
                <input type="text" class="form-control" name="nama_dokter" placeholder="Masukan Nama" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Pilih Jadwal</label>
                <select class="form-control" id="jadwal_dokter" name="jadwal_dokter">
                    <option value="00.00 - 08.00 WIB">00.00 - 08.00 WIB</option>
                    <option value="08.00 - 16.00 WIB">08.00 - 16.00 WIB</option>
                    <option value="16.00 - 23.59 WIB">16.00 - 23.59 WIB</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Pilih Type</label>
                <select class="form-control" id="type_dokter" name="type_dokter">
                    <option value="Spesialis">Spesialis</option>
                    <option value="Umum">Umum</option>
                    <option value="Anak">Anak</option>
                    <option value="Gigi">Gigi</option>
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
                <span class="glyphicon glyphicon-floppy-disk"></span> Simpan
            </button>
            
        </form>
    </div>
</div>

<?php
require_once('koneksi.php');

if($_POST){
    try {
        // Mendapatkan nama file
        $foto_dokter = $_FILES['foto_dokter']['name'];
        // Lokasi penyimpanan file
        $target = "../rumahsakit/admin/dokter/image/".basename($foto_dokter);
        
        //Menuliskan query tambah
        $sql = "INSERT INTO dokter (kode_dokter, nama_dokter, jadwal_dokter, type_dokter, foto_dokter, status) 
                VALUES ('".$_POST['kode_dokter']."','".$_POST['nama_dokter']."','".$_POST['jadwal_dokter']."','".$_POST['type_dokter']."','".$foto_dokter."','".$_POST['status']."')";

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

</body>
</html>
