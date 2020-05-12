<?php

declare(strict_types=1);

$ph_data_path = ROOT . 'resources/data/ph_data_products.json';
$ph_data = json_decode(file_get_contents($ph_data_path), true);

// echo '<pre>'.var_export($ph_data, true).'</pre><hr />';

foreach($ph_data['data']['posts']['edges'] as $product) {
    // echo '<pre>'.var_export($product['node'], true).'</pre><hr />';

    // (`created_at`, `name`, `summary`, `website`, `thumbnail`, 0)
    echo '(' 
        .(new DateTime($product['node']['createdAt']))->format('Y-m-d H:i:s').', '
        .$product['node']['name'].', '
        .$product['node']['tagline'].', '
        .$product['node']['website'].', '
        .$product['node']['thumbnail']['url'].', '
        .'0),<br />';

        $thumbnail = file_get_contents($product['node']['thumbnail']['url']);
        $thumbnail_path = 'public/images/products/thumbnails/'.str_replace(' ', '-', $product['node']['name']). uniqid() .'.webp';
        echo '<pre>'.var_export($thumbnail_path, true).'</pre><hr />';
        file_put_contents($thumbnail_path, $thumbnail);

        foreach($product['node']['media'] as $index => $media) {
            $image = file_get_contents($media['url']);
            $image_path = 'public/images/products/'.str_replace(' ', '-', $product['node']['name']).'_'. $index .'_'. uniqid() .'.webp';
            echo '<pre>'.var_export($image_path, true).'</pre><hr />';
            file_put_contents($image_path, $image);
        }
}



$php_datetime = new DateTime('2020-05-10T07:01:00Z');
echo '<pre>'.var_export($php_datetime->format('Y-m-d H:i:s'), true).'</pre><hr />';