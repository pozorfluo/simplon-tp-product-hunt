<?php

/**
 * Setup
 * Retrieve configuration
 * Run the app !
 * 
 * note
 *   This is is the main entry point
 */

declare(strict_types=1);

define('ROOT', __DIR__ . '/');
define('DEV_FORCE_CONFIG_UPDATE', false);
define('DEV_GLOBALS_DUMP', false);

require ROOT . 'src/Helpers/AutoLoader.php';

use Helpers\Dispatcher;

//------------------------------------------------------------------ session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    /* generate a CRSF guard token */
    if (empty($_SESSION['token'])) {
        $_SESSION['token'] = bin2hex(random_bytes(32));
    }
}
//------------------------------------------------------------------- config
require ROOT . 'src/Helpers/Config.php';
date_default_timezone_set('Europe/Paris');
//--------------------------------------------------------------- playground


// function getIp() {
//     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//         $ip = $_SERVER['HTTP_CLIENT_IP'];
//     } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     } else {
//         $ip = $_SERVER['REMOTE_ADDR'];
//     }
//     return $ip;
//  }
// echo filter_var(
//     "::1",
//     FILTER_VALIDATE_IP,
//     FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6
//  );
//  var_dump(current(unpack( "A16", inet_pton("::1" ))));
//  echo bin2hex(inet_pton("::1" ));
//  echo bin2hex(inet_pton("127.0.0.1" ));
//  echo '<pre>'.var_export($_SERVER['REMOTE_ADDR'], true).'</pre><hr />';
//  echo '<pre>'.var_export($_SERVER['HTTP_CLIENT_IP'], true).'</pre><hr />';
//  echo '<pre>'.var_export($_SERVER['HTTP_X_FORWARDED_FOR'], true).'</pre><hr />';
//  echo '<pre>'.var_export($_SERVER['HTTP_X_FORWARDED'], true).'</pre><hr />';
//  echo '<pre>'.var_export($_SERVER['HTTP_FORWARDED_FOR'], true).'</pre><hr />';
//  echo '<pre>'.var_export($_SERVER['HTTP_FORWARDED'], true).'</pre><hr />';

// echo '<pre>'.var_export(getIp(), true).'</pre><hr />';
// use Models\ProductHuntAPI;
// $api = ProductHuntAPI::fromConfig($config['db_configs']);

// echo '<pre>'.var_export($api->getUserVotes(1), true).'</pre><hr />';
// exit();
// echo '<pre>'.var_export($api->addUser('JeanPlaceHaut-le-Der', '127.0.0.1'), true).'</pre><hr />';
// echo '<pre>'.var_export($api->addUser('JeanPlaqsdqceqsdqsHaut-le-Der', '127.0.0.1'), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getUserbyName('JeanPlaqsdqceqsdqsHaut-le-Der'), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getUserbyName('JeanPlaceHaut-le-Der'), true).'</pre><hr />';
// exit;
// echo '<pre>'.var_export($api->addUser('Dsfsdfesr', '127.0.0.1'), true).'</pre><hr />';
// echo '<pre>'.var_export($api->addUser('Desfr', '1270.0.1'), true).'</pre><hr />';
// echo '<pre>'.var_export($api->addUser('Desssr', '127.0.0.1'), true).'</pre><hr />';
// echo '<pre>'.var_export($api->addUser('e-Deqslmmqssr', '42.0.0.1'), true).'</pre><hr />';
// echo '<pre>'.var_export($api->addUser('aaqsdfsdfDesr', '42.1'), true).'</pre><hr />';
// echo '<pre>'.var_export($api->addUser('aafDesr', '42.1'), true).'</pre><hr />';
// echo '<pre>'.var_export($api->addUser('aaDgqesr', '42.0.1'), true).'</pre><hr />';
// echo '<pre>'.var_export($api->addUser('aaDegqsr', '42.0.1'), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getUserByName('JeanPlaceHaut-le-Der'), true).'</pre><hr />';

// echo '<pre>'.var_export($api->getUserById(1), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getUserById(0), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getUserById(3), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getUser('JeanPlaceHaut-le-Der'), true).'</pre><hr />';

// echo '<pre>'.var_export($api->vote(1, 3), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getProduct(1), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getCategories(), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getCategory(0), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getCategory(1), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getCategory(12), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getCategory(5), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getCategory(5), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getFreshProducts(5), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getFreshProducts(5, 3), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getFreshProducts(10, 3), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getPopularProducts(5), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getPopularProducts(5, 3), true).'</pre><hr />';
// echo '<pre>'.var_export($api->getPopularProducts(10, 3), true).'</pre><hr />';
//---------------------------------------------------------------------- run
$t = microtime(true);

$dispatcher = new Dispatcher($config);
// $dispatcher->route()->cache();
$dispatcher->route();


$time_spent['serving_page'] = (microtime(true) - $t);
//------------------------------------------------------------------- config
require ROOT . 'src/Helpers/SerializeConfig.php';
//-------------------------------------------------------------------- debug
// require ROOT . 'src/Helpers/DebugInfo.php';
