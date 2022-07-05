<?php
  include 'logics/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>STMIKWP - Sistem Informasi</title>

  <!-- Custom fonts for this template-->
  <link href="<?= $dp ?>assets/fonts/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= $dp ?>assets/fonts/css/nunito.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= $dp ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    .img-profile{
     transition : 0.5s ease;
    }
    .img-profile:hover{
        transform: scale(2);
    }
  </style>
</head>

<?php if($url != "login"){
  include 'body/index.php';
  
}else{
  include 'logics/login.php';
  include 'body/login.php';
} ?>

</html>
