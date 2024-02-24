<?php
    session_start();                        
    require_once('koneksi.php');
    $username = $_POST['username'];           
    $password = $_POST['password'];
    $hashed_password = md5($password);
    

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE uname='$username' AND type='admin' LIMIT 1");

    if(mysqli_num_rows($query) == 1) {
        $user_data = mysqli_fetch_assoc($query);
        if($user_data['upass'] == $hashed_password) { // Memeriksa apakah password yang di-hash cocok
            
            if($user_data['type'] == 'admin'){
                $_SESSION['username'] = $user_data['uname'];
                header("location:admin/index.php");
            }
            else {
                echo "gagal login";
            }
        } else {
            echo "gagal login";
        }
    } else {
        echo "gagal login";
    }

?>
