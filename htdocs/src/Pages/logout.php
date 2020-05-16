<?php
if(isset($_COOKIE['user_name'])){
    // echo('Deleted');
    setcookie('user_name', false, strtotime('-1 year'), '/');
    $url = ROOT . 'index.php';
    header("Refresh: 0; url=$url");
}
?>