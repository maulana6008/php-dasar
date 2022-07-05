<?php

if(count($getUrl) < 3){
    echo "<script>location='dashboard'</script>";
}
$id = $getUrl[2];
$edit = $getUrl[1];
$user = $koneksi->query("SELECT * FROM users");
if($edit == 'gas'){
    $bensin = $koneksi->query("SELECT * FROM bensin WHERE id_bensin='$id'");
    if($bensin->num_rows <= 0){
        echo "<script>alert('Gas is unavailable')</script>";
        echo "<script>location='../../bensin'</script>";
    }

}elseif($edit == 'tra-ed'){
    $transaction = $koneksi->query("SELECT * FROM transaksi WHERE id_transaksi='$id'");
    $user_e = $koneksi->query("SELECT * FROM users WHERE id_users='$id'");
    $bensin = $koneksi->query("SELECT * FROM bensin");
    if($transaction->num_rows <= 0){
        echo "<script>alert('Transaction is unavailable')</script>";
        echo "<script>location='../../refuel'</script>";
    }
    
}elseif($edit == 'topup'){
    $topup = $koneksi->query("SELECT * FROM top_up WHERE id_top_up='$id'");
    if($topup->num_rows <= 0){
        echo "<script>alert('Topup is unavailable')</script>";
        echo "<script>location='../../top_up'</script>";
    }
}elseif($edit == 'user'){
    $user_e = $koneksi->query("SELECT * FROM users WHERE id_users='$id' ");
    if($user_e->num_rows <= 0){
        echo "<script>alert('User is unavailable')</script>";
        echo "<script>location='../../user'</script>";
    }
}elseif($edit == 'pegawai'){
    $pegawai_e = $koneksi->query("SELECT * FROM pegawai WHERE id_pegawai='$id' ");
    if($pegawai_e->num_rows <= 0){
        echo "<script>alert('Pegawai is unavailable')</script>";
        echo "<script>location='../../pegawai'</script>";
    }
}



if(isset($_POST['gas'])){
    $gas_type = $_POST['type'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $update = $koneksi->query("UPDATE bensin SET jenis='$gas_type', isi='$qty', harga='$price' WHERE id_bensin='$id'");
    if($update){
        echo "<script>alert('Edit Successfuly')</script>";
        echo "<script>location='../../bensin'</script>"; 
    }else{
        echo "<script>alert('Edit Failed')</script>";
    }
}
if(isset($_POST['topup'])){
    $id_user = $_POST['user'];
    $amount = $_POST['amount'];
    $obj_topup = $topup->fetch_object();
    $user_topup = $koneksi->query("SELECT * FROM users WHERE id_users='$id_user'");
    $saldo = $user_topup->fetch_object()->saldo - $obj_topup->amount + $amount;
    $update_saldo = $koneksi->query("UPDATE users SET saldo='$saldo' WHERE id_users='$id_user'");
    $update = $koneksi->query("UPDATE top_up SET id_user='$id_user', amount='$amount' WHERE id_top_up='$id'");
    if($update){
        echo "<script>alert('Edit Successfuly')</script>";
        echo "<script>location='../../topup'</script>"; 
    }else{
        echo "<script>alert('Edit Failed')</script>";
    }
}

if(isset($_POST['tra-ed'])){    
    $usr = $_POST['user'];
    $gas_type = $_POST['gases'];
    $re = $_POST['refuel'];
    $tgl = date("d-m-Y");
    $id_pegawai = $id_login;

    if(!$gas_type or !$re){
        echo "<script>alert('All input are required')</script>";
    }else{
        $data = $koneksi->query("SELECT bensin.harga, bensin.isi, users.saldo from bensin,users WHERE bensin.id_bensin='$gas_type' and users.id_users='$usr' ");
        $obj = $data->fetch_object();
        $liter = number_format($re/$obj->harga, 2);
        $sisa = number_format($obj->isi - $liter, 2);
        $saldo = number_format($obj->saldo - $re, 2);
        $update = $koneksi->query("UPDATE transaksi SET id_user='$usr', id_bensin='$gas_type', total_harga='$re', pengisian='$liter' WHERE id_transaksi='$id' ");
        if($update){
            $update_bensin = $koneksi->query("UPDATE bensin set isi='$sisa' WHERE id_bensin='$gas_type'");
            echo "<script>alert('Edit Successfuly')</script>";
            echo "<script>location='../../refuel'</script>"; 
        }else{
            echo "<script>alert('Edit Failed')</script>";
        }

    }
}

if(isset($_POST['user_edit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $type = substr($_FILES['photo']['type'],0,5);
    $checker = $koneksi->query("SELECT * FROM users WHERE email='$email' and id_users='$id'");
    $checker1 = $koneksi->query("SELECT * FROM users WHERE email='$email'");
    if($checker->num_rows >= 1 or $checker1->num_rows <= 0){
        if($photo){
            $ext = explode(".",$_FILES['photo']['name'])[1];
            $file_name = $nama.".".$ext;
            if($type == 'image'){
                $destination_path = getcwd().DIRECTORY_SEPARATOR;
                $target_path = $destination_path . "assets/img/" . basename( $file_name );
                if(move_uploaded_file($tmp_name, $target_path)){
                    $update = $koneksi->query("UPDATE users SET nama='$nama',email='$email',foto='$file_name'
                    WHERE id_users='$id'");
                    if($update){
                        echo "<script>alert('Update Successfuly')</script>";
                        echo '<script>location="../../user"</script>';
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
            $update = $koneksi->query("UPDATE users SET nama='$nama', email='$email'
            WHERE id_users='$id'");
            if($update){
                echo "<script>alert('Update Successfuly')</script>";
                echo '<script>location="../../user"</script>';
            }else{
                echo "<script>alert('Update Failed')</script>";
            }
        }
    }elseif($checker1->num_rows >= 1){
        echo "<script>alert('email is available')</script>";
    }
}

if(isset($_POST['pegawai_edit'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $type = substr($_FILES['photo']['type'],0,5);
    $checker = $koneksi->query("SELECT * FROM pegawai WHERE email='$email' and id_pegawai='$id'");
    $checker1 = $koneksi->query("SELECT * FROM pegawai WHERE email='$email'");
    if($checker->num_rows >= 1 or $checker1->num_rows <= 0){
        if($photo){
            $ext = explode(".",$_FILES['photo']['name'])[1];
            $file_name = $nama.".".$ext;
            if($type == 'image'){
                $destination_path = getcwd().DIRECTORY_SEPARATOR;
                $target_path = $destination_path . "assets/img/" . basename( $file_name );
                if(move_uploaded_file($tmp_name, $target_path)){
                    $update = $koneksi->query("UPDATE pegawai SET nama='$nama',email='$email',foto='$file_name'
                    WHERE id_pegawai='$id'");
                    if($update){
                        echo "<script>alert('Update Successfuly')</script>";
                        echo '<script>location="../../pegawai"</script>';
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
            $update = $koneksi->query("UPDATE pegawai SET nama='$nama', email='$email'
            WHERE id_pegawai='$id'");
            if($update){
                echo "<script>alert('Update Successfuly')</script>";
                echo '<script>location="../../pegawai"</script>';
            }else{
                echo "<script>alert('Update Failed')</script>";
            }
        }
    }elseif($checker1->num_rows >= 1){
        echo "<script>alert('email is available')</script>";
    }
}
