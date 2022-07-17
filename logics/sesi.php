<?php 


    if(!isset($_SESSION['user'])){
        echo "<script>alert('login terlebih dahulu')</script>";
        echo "<script>location='login'</script>";
    }

    $id_login = $_SESSION['user'];
    $type_login = $_SESSION['user_type'];
    
    if($type_login == 'pegawai' or $type_login == 'admin'){
        $login_check = $koneksi->query("SELECT * FROM pengelola WHERE id='$id_login' ");
    }else{
        $login_check = $koneksi->query("SELECT * FROM users WHERE id_users='$id_login' ");
    }

    if(!$login_check->num_rows){
        echo "<script>alert('Session is not valid')</script>";
        echo "<script>location='login'</script>";
    }
    $obj_login = $login_check->fetch_object();