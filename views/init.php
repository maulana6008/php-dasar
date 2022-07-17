<?php 

    $getUrl = @explode("/", $_GET["page"]);
    if ($url=='dashboard' || $url=='') {
        include 'views/dashboard.php';
    }else if ($url=='bensin') {
        include 'views/bensin.php';
    }else if ($url=='pegawai') {
        include 'views/pegawai.php';
    }else if ($url=='refuel') {
        include 'views/refuel.php';
    }else if ($url=='topup') {
        include 'views/top_up.php';
    }else if ($url=='user') {
        include 'views/user.php';
    }else if ($url=='edit') {
        include 'views/edit.php';
    }else if ($url=='logout') {
        include 'logics/logout.php';
    }else if ($url=='profile') {
        include 'views/profile.php';
    }else{
        echo "Error 404 : Page Not Found";
    }