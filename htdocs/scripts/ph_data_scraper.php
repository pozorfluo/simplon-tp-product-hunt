<?php

declare(strict_types=1);

require ROOT . 'src/Helpers/Utilities.php';

use Helpers\DB;

$ph_data_path = ROOT . 'resources/data/ph_data_products.json';
$ph_data = json_decode(file_get_contents($ph_data_path), true);

$pdo = new PDO('mysql:dbname=tp_product_hunt;host=127.0.0.1', 'root', '!dummypass!');

echo 'INSERT INTO `products`(`product_id`, `created_at`, `name`, `summary`, `website`, `thumbnail`, `votes_count`)<br />';
echo 'VALUES <br />';
foreach ($ph_data['data']['posts']['edges'] as $id => $product) {

    $website = getRedirectUrl($product['node']['website']);

    /* retrieve thumbnails */
    $thumbnail = file_get_contents($product['node']['thumbnail']['url']);
    $thumbnail_path = 'public/images/products/thumbnails/' . ($id + 1) . '_' . str_replace(' ', '-', $product['node']['name']) . '.webp';
    file_put_contents($thumbnail_path, $thumbnail);

    echo '('
        . '\'' . ($id + 1) . '\', '
        . '\'' . (new DateTime($product['node']['createdAt']))->format('Y-m-d H:i:s') . '\', '
        .  $pdo->quote($product['node']['name']) . ', '
        .  $pdo->quote($product['node']['tagline']) . ', '
        . '\'' . $website . '\', '
        . '\'' . $thumbnail_path . '\', '
        . '0),<br /><br />';
}

echo 'INSERT INTO `articles`(`article_id`, `product_id`, `content`, `media`)<br />';
echo 'VALUES <br />';
foreach ($ph_data['data']['posts']['edges'] as $id => $product) {
    echo '('
        . '\'' . ($id + 1) . '\', '
        . '\'' . ($id + 1) . '\', '
        .  $pdo->quote($product['node']['description']) . ', '
        . '\'[';

    /* retrieve images */
    foreach ($product['node']['media'] as $index => $media) {
        $image = file_get_contents($media['url']);
        $image_path = 'public/images/products/' . ($id + 1) . '_' . str_replace(' ', '-', $product['node']['name']) . '_' . $index . '.webp';
        echo '"' . $image_path . '",';
        file_put_contents($image_path, $image);
    }
    echo ']\'),<br /><br />';
}

$php_datetime = new DateTime('2020-05-10T07:01:00Z');
echo '<pre>' . var_export($php_datetime->format('Y-m-d H:i:s'), true) . '</pre><hr />';
