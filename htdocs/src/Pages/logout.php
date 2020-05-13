<?php

    setcookie('user_name', '', time() -3600);
    $url = "index.php";
    $delay = 1;
    header("Refresh: $delay;url=$url");
?>