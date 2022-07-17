<?php

    if(isset($_SESSION['user'])){
        $id = $_SESSION['user'];
        $type_user = $_SESSION['user_type'];

        if($type_user == 'pegawai' or $type_user == 'admin'){
            $login_check = $koneksi->query("SELECT * FROM pengelola WHERE id='$id' ");
        }else{
            $login_check = $koneksi->query("SELECT * FROM users WHERE id_users='$id' ");
        }
        if($login_check->num_rows){
            echo "<script>alert('You have session')</script>";
            echo "<script>location='dashboard'</script>";
        }
    }

    if(isset($_POST['login'])){

        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $type = $_POST['tipe'];

        if($type == 'admin' or $type == 'pegawai'){
            $check = $koneksi->query("SELECT * FROM pengelola WHERE email='$email' and pass='$pass'");
            if($check->num_rows >= 1){
                $_SESSION['user'] = $check->fetch_object()->id;
                $_SESSION['user_type'] = $type;
                echo "<script>alert('Login Successfuly')</script>";
                echo "<script>location='dashboard'</script>";
            }else{
                echo "<script>alert('Email atau Password salah')</script>";
            }
        }elseif($type == 'user'){
            $check = $koneksi->query("SELECT * FROM users WHERE email='$email' and pass='$pass'");
            if($check->num_rows >= 1){
                $_SESSION['user'] = $check->fetch_object()->id_users;
                $_SESSION['user_type'] = $type;
                echo "<script>alert('Login Successfuly')</script>";
                echo "<script>location='dashboard'</script>";
            }else{
                echo "<script>alert('Email atau Password salah')</script>";
            }
        }

    }

    