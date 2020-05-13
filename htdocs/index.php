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
define('DEV_FORCE_CONFIG_UPDATE', true);
define('DEV_GLOBALS_DUMP', true);

require ROOT . 'src/Helpers/AutoLoader.php';

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

//---------------------------------------------------------------------- run
$t = microtime(true);


// $dispatcher = new Dispatcher($config);
// $dispatcher->route()->cache();
require ROOT . 'src/Pages/home.php';

$time_spent['serving_page'] = (microtime(true) - $t);
//------------------------------------------------------------------- config
require ROOT . 'src/Helpers/SerializeConfig.php';
//-------------------------------------------------------------------- debug
require ROOT . 'src/Helpers/DebugInfo.php';