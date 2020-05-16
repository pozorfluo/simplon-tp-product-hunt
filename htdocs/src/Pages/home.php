<?php
if (isset($_POST['user_name'])) {
    setcookie('user_name', $_POST['user_name'], time() + 3600); //Cookie 1h
    // $url = "index.php";
    // $delay = 1;
    header("Refresh: 0;url=/");
}

//Création nouvel utilisateur s'il n'existe pas dans la BDD
if (isset($_COOKIE['user_name'])) {
    $user = $producthunt_api->getUserbyName($_COOKIE['user_name']);
    
    if ( empty($user)) {
    $user = $producthunt_api->addUser($_COOKIE['user_name'], getIp() );
    //    echo 'add user success';
    }
    
    


    }    
    function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        // echo($ip);
        return $ip;
    }

include ROOT . 'src/Partials/header.php' 
?>

<main class='container-fluid d-flex justify-content-center flex-column pt-5 border '>

    <!-- <h1 class="mb-5 text-center"> Product Hunts </h1> -->

    <div class="row ">


        <div class="col-12 col-md-11 col-lg-10 col-xl-8 text-center m-0 p-0 mx-auto">

            <?php
            if (isset($_COOKIE['user_name'])) {
                include ROOT . 'src/Partials/product_list.php';
            } else {
                echo ("<h4>Créez un compte ou Connectez vous pour accéder au site.</h4> <hr>");
                include ROOT . 'src/Partials/index_login.php';
            }
            ?>

        </div>

    </div>

</main>

<?php include ROOT . 'src/Partials/footer.php' ?>
