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

$mock_products =    [
    [
        "name" => "Rewind",
        "createdAt" => "2020-05-10T07:01:00Z",
        "description" => "Rewind displays your bookmarks filtered by date, with thumbnails and instant search. It takes one click to see the links you saved yesterday, last week, last month. It's totally free and it relies on your local bookmarks, you don't have to create an account.",
        "website" => "https://www.rewind-website.com",
        "id" => "199004",
        "isCollected" => false,
        "isVoted" => false,
        "media" => [
            "url" => "https://ph-files.imgix.net/a892b3b3-0397-44ac-b2c2-f583f7d8f668?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/95dcfbac-e159-48e4-91aa-f21933e14570?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/8a4f4f3c-7852-47f6-b675-b62db455e0bf?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/c5bfce52-32c6-4913-91fb-95d2c21b597e?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/f500d84f-b9dc-47e0-aa54-d43ed79d09e3?auto=format&fit=crop",
        ],
        "summary" => "Your bookmarks, by date, with thumbnails and instant search",
        "thumbnail" => "https://ph-files.imgix.net/f500d84f-b9dc-47e0-aa54-d43ed79d09e3?auto=format&fit=crop",
        "votesCount" => 112,
        "commentsCount" => 7,
    ],
    [
        "name" => "Rewind2",
        "createdAt" => "2020-05-10T07:01:00Z",
        "description" => "Rewind displays your bookmarks filtered by date, with thumbnails and instant search. It takes one click to see the links you saved yesterday, last week, last month. It's totally free and it relies on your local bookmarks, you don't have to create an account.",
        "website" => "https://www.rewind-website.com",
        "id" => "199004",
        "isCollected" => false,
        "isVoted" => false,
        "media" => [
            "url" => "https://ph-files.imgix.net/a892b3b3-0397-44ac-b2c2-f583f7d8f668?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/95dcfbac-e159-48e4-91aa-f21933e14570?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/8a4f4f3c-7852-47f6-b675-b62db455e0bf?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/c5bfce52-32c6-4913-91fb-95d2c21b597e?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/f500d84f-b9dc-47e0-aa54-d43ed79d09e3?auto=format&fit=crop",
        ],
        "summary" => "Your bookmarks, by date, with thumbnails and instant search",
        "thumbnail" => "https://ph-files.imgix.net/f500d84f-b9dc-47e0-aa54-d43ed79d09e3?auto=format&fit=crop",
        "votesCount" => 112,
        "commentsCount" => 7,
    ],
    [
        "name" => "Rewind3",
        "createdAt" => "2020-05-10T07:01:00Z",
        "description" => "Rewind displays your bookmarks filtered by date, with thumbnails and instant search. It takes one click to see the links you saved yesterday, last week, last month. It's totally free and it relies on your local bookmarks, you don't have to create an account.",
        "website" => "https://www.rewind-website.com",
        "id" => "199004",
        "isCollected" => false,
        "isVoted" => false,
        "media" => [
            "url" => "https://ph-files.imgix.net/a892b3b3-0397-44ac-b2c2-f583f7d8f668?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/95dcfbac-e159-48e4-91aa-f21933e14570?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/8a4f4f3c-7852-47f6-b675-b62db455e0bf?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/c5bfce52-32c6-4913-91fb-95d2c21b597e?auto=format&fit=crop",
            "url" => "https://ph-files.imgix.net/f500d84f-b9dc-47e0-aa54-d43ed79d09e3?auto=format&fit=crop",
        ],
        "summary" => "Your bookmarks, by date, with thumbnails and instant search",
        "thumbnail" => "https://ph-files.imgix.net/f500d84f-b9dc-47e0-aa54-d43ed79d09e3?auto=format&fit=crop",
        "votesCount" => 112,
        "commentsCount" => 7,
    ],
];
      

//--------------------------------------------------------------- playground


//---------------------------------------------------------------------- run

//------------------------------------------------------------------- config



//-------------------------------------------------------------------- debug
