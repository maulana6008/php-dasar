<?php

    $id_pegawai = $_SESSION['user'];
    $bensin = $koneksi->query("SELECT * FROM bensin");
    $transaction = $koneksi->query("SELECT * FROM transaksi");
    $user = $koneksi->query("SELECT * FROM users");

    if(isset($_POST['add'])){
        $usr = $_POST['user'];
        $gas_type = $_POST['gas'];
        $re = $_POST['refuel'];
        $tgl = date("d-m-Y");

        if(!$gas_type or !$re){
            echo "<script>alert('All input are required')</script>";
        }else{
            $data = $koneksi->query("SELECT bensin.harga, bensin.isi, users.saldo from bensin,users WHERE bensin.id_bensin='$gas_type' and users.id_users='$usr' ");
            $obj = $data->fetch_object();
    
            $liter = $re/$obj->harga;
            $liter = number_format($liter, 2);
            $sisa = number_format($obj->isi - $liter, 2);
            $saldo = $obj->saldo - $re;
            if($sisa >= 0){
                $insert = $koneksi->query("INSERT INTO transaksi VALUES(
                    NULL,
                    '".$usr."',
                    '".$gas_type."',
                    '".$id_pegawai."',
                    '".$liter."',
                    '".$re."',
                    '".$tgl."'
                )");

                if($insert){
                    $update_bensin = $koneksi->query("UPDATE bensin set isi='$sisa' WHERE id_bensin='$gas_type'");
                    if($update_bensin){
                            
                        if($obj->saldo < $re){
                            $u_user = $koneksi->query("UPDATE users set saldo='0' WHERE id_users='$usr'");
                            $pay = abs($saldo);
                            if($u_user){
                                echo "<script>alert('You Balance is less, you have to pay $pay')</script>";
                                echo "<script>alert('Successfuly Add Refuel')</script>";
                                echo '<meta http-equiv="refresh" content="1">';
                            }

                        }else{
                            $u_user = $koneksi->query("UPDATE users set saldo='$saldo' WHERE id_users='$usr'");
                            if($u_user){
                                echo "<script>alert('Successfuly Add Refuel')</script>";
                                echo '<meta http-equiv="refresh" content="1">';
                            }
                        }
                    }
                }
            }else{
                echo "<script>alert('Stock is not enough')</script>";
            }

        }

    }
    if(isset($_POST['delete'])){
        $id = $_POST['_id'];
        $select = $koneksi->query("SELECT users.saldo, bensin.isi, transaksi.id_user, transaksi.id_bensin,
        transaksi.pengisian, transaksi.total_harga from transaksi,users,bensin
        WHERE transaksi.id_transaksi='$id' and users.id_users=transaksi.id_user
        and bensin.id_bensin = transaksi.id_bensin ");
        $obj = $select->fetch_object();
        if($obj):
            $saldo = $obj->saldo + $obj->total_harga;
            $isi = $obj->isi + $obj->pengisian;
            $id_user = $obj->id_user;
            $id_bensin = $obj->id_bensin;
            $delete = $koneksi->query("DELETE FROM transaksi WHERE id_transaksi='$id'");
            if($delete){
                $update = $koneksi->query("UPDATE users SET saldo='$saldo' WHERE id_users='$id_user'");
                $update1 = $koneksi->query("UPDATE bensin SET isi='$isi' WHERE id_bensin='$id_bensin'");
                if($update and $update1){
                    echo "<script>alert('delete successfuly')</script>";
                    echo '<meta http-equiv="refresh" content="1">';
                }else{
                    echo "<script>alert('delete failed')</script>";
                    echo '<meta http-equiv="refresh" content="1">';
                }
            }else{
                echo "<script>alert('delete failed')</script>";
                echo '<meta http-equiv="refresh" content="1">';
            }
        else:
            echo "<script>alert('delete failed')</script>";
        endif;
    }