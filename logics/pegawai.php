<?php 

if($type_login != 'admin'){
    echo '<script>alert("Maaf! Anda tidak memiliki akses");</script>';
    echo "<script>location='".$db."dashboard'</script>";
}
$pegawai = $koneksi->query("SELECT * FROM pengelola WHERE type='pegawai'");

if(isset($_POST['add'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $photo = $_FILES['photo']['name'];
    $type = substr($_FILES['photo']['type'],0,5);
    $tmp_name = $_FILES['photo']['tmp_name'];
    $checker = $koneksi->query("SELECT * FROM pengelola WHERE email='$email' and type='pegawai'");
    if(!$nama or !$email or !$pass){
        echo "<script>alert('All input are Required')</script>";
    }else{
        if($checker->num_rows >= 1){
            echo "<script>alert('email is availabel')</script>";
        }else{
            if($photo){
                $ext = explode(".",$_FILES['photo']['name']);
                $ext = $ext[count($ext)-1];
                $file_name = $nama.".".$ext;
                if($type == 'image'){
                    $destination_path = getcwd().DIRECTORY_SEPARATOR;
                    $target_path = $destination_path . "/assets/img/" . basename( $file_name );
                    if(move_uploaded_file($tmp_name, $target_path)){
                        $insert = $koneksi->query("INSERT INTO pengelola VALUES(
                            NULL,
                            '".$nama."',
                            '".$email."',
                            '".$pass."',
                            'pegawai',
                            '".$file_name."'
                        )");
                        if($insert){
                            echo "<script>alert('Inserting Successfuly')</script>";
                            echo '<meta http-equiv="refresh" content="1">';
                        }else{
                            echo "<script>alert('Inserting Failed')</script>";
                        }
                    }else{
                        echo "<script>alert('Upload Photo Failed')</script>";
                    }
                }else{
                    echo "<script>alert('Format photo is not valid')</script>";
                }
            }else{
                $insert = $koneksi->query("INSERT INTO pengelola VALUES(
                    NULL,
                    '".$nama."',
                    '".$email."',
                    '".$pass."',
                    'pegawai',
                    ''
                )");
                if($insert){
                    echo "<script>alert('Inserting Successfuly')</script>";
                    echo '<meta http-equiv="refresh" content="1">';
                }else{
                    echo "<script>alert('Inserting Failed')</script>";
                }
            }
        }
    }
}
if(isset($_POST['delete'])){
    $id = $_POST['_id'];
    $delete = $koneksi->query("DELETE FROM pengelola WHERE id='$id'");
    if($delete){
        echo "<script>alert('delete successfuly')</script>";
        echo '<meta http-equiv="refresh" content="1">';
    }else{
        echo "<script>alert('delete failed')</script>";
        echo '<meta http-equiv="refresh" content="1">';
    }
}