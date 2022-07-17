<?php

    if($type_login != 'user'){

        $id_pegawai = $_SESSION['user'];
        $pegawai = $koneksi->query("SELECT * FROM pengelola WHERE id='$id_pegawai' ");
        $top_ups = $koneksi->query("SELECT * FROM top_up WHERE id_pegawai='$id_pegawai' ");
        $user = $koneksi->query("SELECT * FROM users");
    
        // $user_amount = $user->fetch_object();
        // echo "<pre>";
        // print_r($user_amount);
        // echo "</pre>";
    
        if(isset($_POST['refuel'])){
    
            $buyer = $_POST['user'];
            $amount = $_POST['amount'];
            $date = date("d-m-Y");
            $insert = $koneksi->query("INSERT INTO top_up VALUES(
                NULL,
                '".$id_pegawai."',
                '".$amount."',
                '".$buyer."',
                '".$date."'
            )");
            if($insert){
                $user_amount = $koneksi->query("SELECT * FROM users WHERE id_users='$buyer'");
                $user_amount = $user_amount->fetch_object()->saldo;
                $amount = $user_amount + $amount;
                $top_up = $koneksi->query("UPDATE users SET saldo='$amount' WHERE id_users='$buyer' ");
                if($top_up){
                    echo "<script>alert('Successfully added to your balance')</script>";
                    echo '<meta http-equiv="refresh" content="1">';
                }
            }else{
                echo "error";
            }
    
        }
        if(isset($_POST['delete'])){
            $id = $_POST['_id'];
            $topup = $koneksi->query("SELECT * FROM top_up WHERE id_top_up='$id'");
            $obj_tp = $topup->fetch_object();
            $id_user = $obj_tp->id_user;
            $user_t = $koneksi->query("SELECT * FROM users WHERE id_users='$id_user'");
            $obj_user = $user_t->fetch_object();
    
            $saldo = $obj_user->saldo - $obj_tp->amount;
            $saldo = $saldo < 0 ? 0 : $saldo;
    
            
            $delete = $koneksi->query("DELETE FROM top_up WHERE id_top_up='$id'");
            if($delete){
                $edit = $koneksi->query("UPDATE users SET saldo='$saldo' WHERE id_users='$id_user' ");
                if($edit){
                    echo "<script>alert('delete successfuly')</script>";
                    echo '<meta http-equiv="refresh" content="1">';
                }
            }else{
                echo "<script>alert('delete failed')</script>";
                echo '<meta http-equiv="refresh" content="1">';
            }
        }

    }else{
        $id_user = $_SESSION['user'];
        $top_ups = $koneksi->query("SELECT * FROM top_up WHERE id_user='$id_user' ");
    }