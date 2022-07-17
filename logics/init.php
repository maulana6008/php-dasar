<?php

    include 'config/koneksi.php';

    $getUrl = @explode("/", $_GET["page"]);
    $url = $getUrl[0];
    $dp = "";
    $redirect = "";
    if(count($getUrl) == 2){
        $dp = "../";
    }else if(count($getUrl) == 3){
        $dp = "../../";
        $redirect = "../../";
    }

    if($url != "login"){
        include 'logics/sesi.php';
    }

    if ($url=='dashboard' || $url=='') {
        include 'logics/dashboard.php';
    }else if ($url=='bensin') {
        include 'logics/bensin.php';
    }else if ($url=='pegawai') {
        include 'logics/pegawai.php';
    }else if ($url=='refuel') {
        include 'logics/refuel.php';
    }else if ($url=='topup') {
        include 'logics/top_up.php';
    }else if ($url=='user') {
        include 'logics/user.php';
    }else if ($url=='edit') {
        include 'logics/edit.php';
    }else if ($url=='profile') {
        include 'logics/profile.php';
    }
?>