<?php 
    $id = $_SESSION['user'];
    if($type_login != 'user'){
        $user = $koneksi->query("SELECT * FROM users");
        $tot_us = $koneksi->query("SELECT count(nama) as Total_user FROM users");
        $bensin = $koneksi->query("SELECT * FROM bensin");
        $trans = $koneksi->query("SELECT * FROM transaksi WHERE id_pegawai='$id' ");
        $total = $koneksi->query("SELECT sum(total_harga) as Penjualan FROM transaksi");
        $top_ups = $koneksi->query("SELECT * FROM top_up WHERE id_pegawai='$id' ");
        $tot_top = $koneksi ->query("SELECT sum(amount) as Total_topup FROM top_up");
    }else{
        $user = $koneksi->query("SELECT * FROM users WHERE id_users='$id' ");
        $user = $user->fetch_object();
    }