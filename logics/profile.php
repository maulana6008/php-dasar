<?php
    $id = $_SESSION['user'];
    if(isset($_POST['edit'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $photo = $_FILES['photo']['name'];
        if(!empty($_POST['pass'])){
            $pass = md5($_POST['pass']);
        }else{
            $pass = null;
        }
        $tmp_name = $_FILES['photo']['tmp_name'];
        $type = substr($_FILES['photo']['type'],0,5);
        if($type_login != 'user'){
            $checker = $koneksi->query("SELECT * FROM pengelola WHERE email='$email' and id='$id'");
            $checker1 = $koneksi->query("SELECT * FROM pengelola WHERE email='$email'");
        }else{
            $checker = $koneksi->query("SELECT * FROM users WHERE email='$email' and id_users='$id'");
            $checker1 = $koneksi->query("SELECT * FROM users WHERE email='$email'");
        }
        if($checker->num_rows >= 1 or $checker1->num_rows <= 0){
            if($photo){
                $ext = explode(".",$_FILES['photo']['name'])[1];
                $file_name = $nama.".".$ext;
                if($type == 'image'){
                    $destination_path = getcwd().DIRECTORY_SEPARATOR;
                    $target_path = $destination_path . "assets/img/" . basename( $file_name );
                    if(move_uploaded_file($tmp_name, $target_path)){
                        if($pass){
                            if($type_login != 'user'){
                                $update = $koneksi->query("UPDATE pengelola SET nama='$nama',email='$email',foto='$file_name',pass='$pass' WHERE id='$id'");
                            }else{
                                $update = $koneksi->query("UPDATE users SET nama='$nama',email='$email',foto='$file_name',pass='$pass' WHERE id_users='$id'");
                            }
                        }else{
                            if($type_login != 'user'){
                                $update = $koneksi->query("UPDATE pengelola SET nama='$nama',email='$email',foto='$file_name' WHERE id='$id'");
                            }else{
                                $update = $koneksi->query("UPDATE users SET nama='$nama',email='$email',foto='$file_name' WHERE id_users='$id'");
                            }
                        }
                        if($update){
                            echo "<script>alert('Update Successfuly')</script>";
                            echo '<meta http-equiv="refresh" content="1">';
                        }else{
                            echo "<script>alert('Update Failed')</script>";
                        }
                    }else{
                        echo "<script>alert('Upload Photo Failed')</script>";
                    }
                }else{
                    echo "<script>alert('Format photo is not valid')</script>";
                }
            }else{
                if($pass){
                    if($type_login != 'user'){
                        $update = $koneksi->query("UPDATE pengelola SET nama='$nama',email='$email',pass='$pass' WHERE id='$id'");
                    }else{
                        $update = $koneksi->query("UPDATE users SET nama='$nama',email='$email',pass='$pass' WHERE id_users='$id'");
                    }
                }else{
                    if($type_login != 'user'){
                        $update = $koneksi->query("UPDATE pengelola SET nama='$nama',email='$email' WHERE id='$id'");
                    }else{
                        $update = $koneksi->query("UPDATE users SET nama='$nama',email='$email' WHERE id_users='$id'");
                    }
                }
                if($update){
                    echo "<script>alert('Update Successfuly')</script>";
                    echo '<meta http-equiv="refresh" content="1">';
                }else{
                    echo "<script>alert('Update Failed')</script>";
                }
            }
        }elseif($checker1->num_rows >= 1){
            echo "<script>alert('email is available')</script>";
        }
    }