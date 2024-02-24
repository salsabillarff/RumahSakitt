<?php
// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah input kritik_saran tidak kosong
    if (!empty($_POST['kritik_saran'])) {
        // Mengambil kritik_saran dari form
        $kritik_saran = $_POST['kritik_saran'];

        // Memeriksa apakah koneksi ke database berhasil
        require_once('koneksi.php');

        // Menyiapkan statement SQL untuk menyimpan kritik dan saran
        $stmt = $koneksi->prepare("INSERT INTO kritik_saran (kritik_saran, created_date) VALUES (?, NOW())");

        // Mengeksekusi statement dengan parameter
        $stmt->bind_param("s", $kritik_saran);
        $stmt->execute();

        // Menutup statement
        $stmt->close();

        // Menutup koneksi
        $koneksi->close();

        // Mengalihkan pengguna kembali ke halaman sebelumnya
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit();
    } else {
        // Jika input kritik_saran kosong, tampilkan pesan error
        echo "Kritik dan saran tidak boleh kosong.";
        exit();
    }
} else {
    // Jika halaman diakses langsung tanpa melalui form, tampilkan pesan error
    echo "Akses tidak sah.";
    exit();
}
?>
