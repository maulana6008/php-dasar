<?php 

    session_start();
    session_destroy();
    echo "<script>location='".$redirect."login'</script>";

?>