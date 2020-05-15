<?php


declare(strict_types=1);

namespace Models;

use Exception;
use PDOException;
use Helpers\DBConfig;
use Controllers\Controller;


/**
 * ProductHunt API
 */
class ProductHuntAPI extends DBPDO
{
    /**
     * Create a new ProductHuntAPI instance from a decoded config json.
     * 
     * @param  array $config
     * @return ProductHuntAPI
     */
    public static function fromConfig(array $db_configs): ProductHuntAPI
    {
        $controller = new \Controllers\ProductHuntAPI();

        $controller->set(['db_configs' => $db_configs]);
        return new self($controller);
    }


    /**
     * Create a new ProductHuntAPI instance.
     *
     * @param  Controller|NULL $controller
     * @return void
     */
    public function __construct(?Controller $controller = NULL)
    {
        if (is_null($controller)) {
            $controller = new \Controllers\ProductHuntAPI();
        }
        parent::__construct($controller);
    }

    /**
     * Get most recent products.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $count  How many products to return (default = 10).
     * @param  int $offset How many products to skip   (default = 0)
     *                     Use for pagination.
     * 
     * @return array <pre><code>[
     *     [
     *         'product_id'     => int,
     *         'name'           => string,
     *         'created_at'     => string date('Y-m-d H:i:s'),
     *         'website'        => string,
     *         'summary'        => string,
     *         'thumbnail'      => string,
     *         'votes_count'    => int,
     *         'comments_count' => int
     *     ], 
     *     ...
     * ] </code></pre>
     */
    public function getFreshProducts(int $count = 10, int $offset = 0): array
    {
        if ($count < 0) {
            $count = 10;
        }
        if ($offset < 0) {
            $offset = 0;
        }

        return $this->execute(
            'product_hunt',
            'SELECT
                 `products`.`product_id`,
                 `products`.`created_at`,
                 `products`.`name`,
                 `products`.`summary`,
                 `products`.`website`,
                 `products`.`thumbnail`,
                 COUNT(`comments`.`product_id`) AS `comments_count`,
                 COUNT(`votes`.`product_id`) AS `votes_count`
             FROM 
                 `products`
             LEFT JOIN
                 `comments`
             ON
                 `products`.`product_id` = `comments`.`product_id`
             LEFT JOIN
                 `votes`
             ON
                 `products`.`product_id` = `votes`.`product_id`
             GROUP BY
                 `products`.`product_id`
             ORDER BY
                 `products`.`created_at` DESC
             LIMIT ? OFFSET ?;',
            [$count, $offset]
        );
        // return [
        //     [
        //         'product_id'     => 1,
        //         'name'           => 'Rewind',
        //         'created_at'     => '2020-05-10 07:01:00',
        //         'website'        => 'https://rewind.netlify.app/?ref=producthunt',
        //         'summary'        => 'Your bookmarks, by date, with thumbnails and instant search',
        //         'thumbnail'      => 'public/images/products/thumbnails/1_Rewind.webp',
        //         'votes_count'    => 0,
        //         'comments_count' => 0
        //     ], [
        //         'product_id'     => 2,
        //         'name'           => 'Buy For Life',
        //         'created_at'     => '2020-05-10 07:01:00',
        //         'website'        => 'https://rewind.netlify.app/?ref=producthunt',
        //         'summary'        => 'Your bookmarks, by date, with thumbnails and instant search',
        //         'thumbnail'      => 'public/images/products/thumbnails/2_Buy-For-Life.webp',
        //         'votes_count'    => 0,
        //         'comments_count' => 0
        //     ]
        // ];
    }

    /**
     * Get most popular products.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $count  How many products to return (default = 10).
     * @param  int $offset How many products to skip   (default = 0)
     *                     Use for pagination.
     * 
     * @return array <pre><code>[
     *     [
     *         'product_id'     => int,
     *         'name'           => string,
     *         'created_at'     => string date('Y-m-d H:i:s'),
     *         'website'        => string,
     *         'summary'        => string,
     *         'thumbnail'      => string,
     *         'votes_count'    => int,
     *         'comments_count' => int
     *     ], 
     *     ...
     * ] </code></pre>
     */
    public function getPopularProducts(int $count = 10, int $offset = 0): array
    {
        if ($count < 0) {
            $count = 10;
        }
        if ($offset < 0) {
            $offset = 0;
        }

        return $this->execute(
            'product_hunt',
            'SELECT
                 `products`.`product_id`,
                 `products`.`created_at`,
                 `products`.`name`,
                 `products`.`summary`,
                 `products`.`website`,
                 `products`.`thumbnail`,
                 COUNT(`comments`.`product_id`) AS `comments_count`,
                 COUNT(`votes`.`product_id`) AS `votes_count`
             FROM 
                 `products`
             LEFT JOIN
                 `comments`
             ON
                 `products`.`product_id` = `comments`.`product_id`
             LEFT JOIN
                 `votes`
             ON
                 `products`.`product_id` = `votes`.`product_id`
             GROUP BY
                 `products`.`product_id`
             ORDER BY
                `votes_count` DESC, `products`.`created_at` DESC
             LIMIT ? OFFSET ?;',
            [$count, $offset]
        );
    }

    /**
     * Get categories sorted by id.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $count  How many categories to return (default = 10).
     * @param  int $offset How many categories to skip   (default = 0)
     *                     Use for pagination.
     * 
     * @return array <pre><code>[
     *     [
     *         'category_id'     => int,
     *         'name'           => string,
     *     ], 
     *     ...
     * ] </code></pre>
     */
    public function getCategories(int $count = 10, int $offset = 0): array
    {
        if ($count < 0) {
            $count = 10;
        }
        if ($offset < 0) {
            $offset = 0;
        }

        return $this->execute(
            'product_hunt',
            'SELECT
                 `category_id`,
                 `name`
             FROM
                 `categories`
             LIMIT ? OFFSET ?;',
            [$count, $offset]
        );
    }

    /**
     * Get category info for a given category id.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $category_id
     * 
     * @return array <pre><code>[
     *     'category_id'    => int,
     *     'name'           => string,
     *     'summary'        => string,
     *     'thumbnail'      => string
     * ] </code></pre>
     */
    public function getCategory(int $category_id): array
    {
        if ($category_id <= 0) {
            // $category_id = 0;
            return [];
        }

        $category = $this->execute(
            'product_hunt',
            'SELECT
                 `category_id`,
                 `name`,
                 `summary`,
                 `thumbnail`
             FROM
                 `categories`
             WHERE
            `category_id` = ?;',
            [$category_id]
        );

        if (!empty($category)) {
            $category = $category[0];
        }

        return $category;
    }
    /**
     * Get product content associated with a given product id.
     * 
     * @api
     * @todo Implement query
     * @todo Return votes_count, comments_count, categories
     * 
     * @param  int $product_id
     * 
     * @return array <pre><code>[
     *     'article_id'     => int,
     *     'product_id'     => int,
     *     'content'        => string,
     *     'media'          => array[string, ...]
     *     'comments'       => [
     *                             [
     *                                 'comment_id'     => int,
     *                                 'product_id'     => int,
     *                                 'user_id'        => int,
     *                                 'name'           => string,
     *                                 'created_at'     => string date('Y-m-d H:i:s'),
     *                                 'content'        => string
     *                             ], 
     *                             ...
     *                         ]
     * ] </code></pre>
     */
    public function getProduct(int $product_id): array
    {
        if ($product_id <= 0) {
            return [];
        }

        $product = $this->execute(
            'product_hunt',
            'SELECT
                 `product_id`,
                 `article_id`,
                 `content`,
                 `media`
             FROM 
                 `articles`
             WHERE
                `product_id` = ?;',
            [$product_id]
        );

        if (!empty($product)) {
            $product = $product[0];
        }

        if (isset($product['media'])) {
            $product['media'] = json_decode($product['media']);
        }

        return $product;
    }

    /**
     * Get products associated with a given category.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $category_id
     * @param  int $count  How many products to return (default = 10).
     * @param  int $offset How many products to skip   (default = 0)
     *                     Use for pagination.
     * 
     * @return array <pre><code>[
     *     [
     *         'product_id'     => int,
     *         'name'           => string,
     *         'created_at'     => string date('Y-m-d H:i:s'),
     *         'website'        => string,
     *         'summary'        => string,
     *         'thumbnail'      => string,
     *         'votes_count'    => int,
     *         'comments_count' => int
     *     ], 
     *     ...
     * ] </code></pre>
     */
    public function getProductsCollection(
        int $category_id,
        int $count = 10,
        int $offset = 0
    ): array {
        return [
            [
                'product_id'     => 5,
                'name'           => 'Jump In Meeting',
                'created_at'     => '2020-05-10 07:01:00',
                'website'        => 'https://rewind.netlify.app/?ref=producthunt',
                'summary'        => 'Your bookmarks, by date, with thumbnails and instant search',
                'thumbnail'      => 'public/images/products/thumbnails/1_Rewind.webp',
                'votes_count'    => 0,
                'comments_count' => 0
            ], [
                'product_id'     => 6,
                'name'           => 'ShopSavvy for Chrome',
                'created_at'     => '2020-05-10 07:01:00',
                'website'        => 'https://rewind.netlify.app/?ref=producthunt',
                'summary'        => 'Your bookmarks, by date, with thumbnails and instant search',
                'thumbnail'      => 'public/images/products/thumbnails/1_Rewind.webp',
                'votes_count'    => 0,
                'comments_count' => 0
            ]
        ];
    }

    /**
     * Find products whose name match given search string.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  string $search_string
     * @param  int $count  How many products to return (default = 10).
     * @param  int $offset How many products to skip   (default = 0)
     *                     Use for pagination.
     * 
     * @return array <pre><code>[
     *     [
     *         'product_id'     => int,
     *         'name'           => string,
     *         'created_at'     => string date('Y-m-d H:i:s'),
     *         'website'        => string,
     *         'summary'        => string,
     *         'thumbnail'      => string,
     *         'votes_count'    => int,
     *         'comments_count' => int
     *     ], 
     *     ...
     * ] </code></pre>
     */
    public function findProductsByName(
        string $search_string,
        int $count = 10,
        int $offset = 0
    ): array {
        return [
            [
                'product_id'     => 1,
                'name'           => 'Rewind',
                'created_at'     => '2020-05-10 07:01:00',
                'website'        => 'https://rewind.netlify.app/?ref=producthunt',
                'summary'        => 'Your bookmarks, by date, with thumbnails and instant search',
                'thumbnail'      => 'public/images/products/thumbnails/1_Rewind.webp',
                'votes_count'    => 0,
                'comments_count' => 0
            ], [
                'product_id'     => 3,
                'name'           => 'Remoty',
                'created_at'     => '2020-05-10 07:01:00',
                'website'        => 'https://rewind.netlify.app/?ref=producthunt',
                'summary'        => 'Your bookmarks, by date, with thumbnails and instant search',
                'thumbnail'      => 'public/images/products/thumbnails/1_Rewind.webp',
                'votes_count'    => 0,
                'comments_count' => 0
            ]
        ];
    }

    /**
     * Find products whose content match given search string.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  string $search_string
     * @param  int $count  How many products to return (default = 10).
     * @param  int $offset How many products to skip   (default = 0)
     *                     Use for pagination.
     * 
     * @return array <pre><code>[
     *     [
     *         'product_id'     => int,
     *         'name'           => string,
     *         'created_at'     => string date('Y-m-d H:i:s'),
     *         'website'        => string,
     *         'summary'        => string,
     *         'thumbnail'      => string,
     *         'votes_count'    => int,
     *         'comments_count' => int
     *     ], 
     *     ...
     * ] </code></pre>
     */
    public function findProductsByContent(
        string $search_string,
        int $count = 10,
        int $offset = 0
    ): array {
        return [
            [
                'product_id'     => 3,
                'name'           => 'Remoty',
                'created_at'     => '2020-05-10 07:01:00',
                'website'        => 'https://rewind.netlify.app/?ref=producthunt',
                'summary'        => 'Your bookmarks, by date, with thumbnails and instant search',
                'thumbnail'      => 'public/images/products/thumbnails/1_Rewind.webp',
                'votes_count'    => 0,
                'comments_count' => 0
            ], [
                'product_id'     => 7,
                'name'           => 'Meeter',
                'created_at'     => '2020-05-10 07:01:00',
                'website'        => 'https://rewind.netlify.app/?ref=producthunt',
                'summary'        => 'Your bookmarks, by date, with thumbnails and instant search',
                'thumbnail'      => 'public/images/products/thumbnails/1_Rewind.webp',
                'votes_count'    => 0,
                'comments_count' => 0
            ]
        ];
    }

    /**
     * Get products id a given user voted for.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $user_id
     * 
     * @return array <pre><code>[
     *     int,
     *     ...
     * ] </code></pre>
     */
    public function getUserVotes(int $user_id): array
    {
        return [1, 2, 3, 9];
    }

    /**
     * Get comments for a given product.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $product_id
     * 
     * @return array <pre><code>[
     *     [
     *         'comment_id'     => int,
     *         'product_id'     => int,
     *         'user_id'        => int,
     *         'name'           => string,
     *         'created_at'     => string date('Y-m-d H:i:s'),
     *         'content'        => string
     *     ], 
     *     ...
     * ] </code></pre>
     */
    public function getProductComments(int $product_id): array
    {
        return [
            [
                'comment_id'     => 1,
                'product_id'     => $product_id,
                'user_id'        => 1,
                'name'           => 'JeanPlaceHaut-le-Der',
                'created_at'     => '2020-05-10 07:01:00',
                'content'        => 'This is a placeholder comment.'
            ],
            [
                'comment_id'     => 2,
                'product_id'     => $product_id,
                'user_id'        => 1,
                'name'           => 'JeanPlaceHaut-le-Der',
                'created_at'     => '2020-05-10 07:01:01',
                'content'        => 'This is another placeholder comment.'
            ]
        ];
    }

    /**
     * Get user info for a given user id.
     * 
     * note
     *      Returns an empty array if given user id does NOT exist.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $user_id
     * 
     * @return array <pre><code>[
     *     'user_id'     => int,
     *     'name'        => string,
     *     'created_at'  => string date('Y-m-d H:i:s'),
     *     'ip'          => string
     * ] </code></pre>
     */
    public function getUserById(int $user_id): array
    {
        if ($user_id <= 0) {
            return [];
        }

        $user = $this->execute(
            'product_hunt',
            'SELECT
                 `user_id`,
                 `name`,
                 `created_at`,
                 `ip`
             FROM
                 `users`
             WHERE
                 `user_id` = ?;',
            [$user_id]
        );

        if (!empty($user)) {
            $user = $user[0];
        }

        if (isset($user['ip'])) {
            $user['ip'] = long2ip($user['ip']);
        }

        return $user;
    }

    /**
     * Get user info for a given user name.
     * 
     * note
     *      Returns an empty array if given user name does NOT exist.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  string $name
     * 
     * @return array <pre><code>[
     *     'user_id'     => int,
     *     'name'        => string,
     *     'created_at'  => string date('Y-m-d H:i:s'),
     *     'ip'          => string
     * ] </code></pre>
     */
    public function getUserbyName(string $name): array
    {
        if ($name === '') {
            return [];
        }

        $user = $this->execute(
            'product_hunt',
            'SELECT
                 `user_id`,
                 `name`,
                 `created_at`,
                 `ip`
             FROM
                 `users`
             WHERE
                 `name` = ?;',
            [$name]
        );

        if (!empty($user)) {
            $user = $user[0];
        }

        if (isset($user['ip'])) {
            $user['ip'] = long2ip($user['ip']);
        }

        return $user;
    }

    /**
     * Register a given new user.
     * 
     * note
     *      Returns an empty array if operation could NOT complete.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  string $name
     * @param  string $ip
     * 
     * @return array <pre><code>[
     *     'user_id'     => int,
     *     'name'        => string,
     *     'created_at'  => string date('Y-m-d H:i:s'),
     *     'ip'          => string
     * ] </code></pre>
     */
    public function addUser(string $name, string $ip): array
    {
        return [
            'user_id'     => 1,
            'name'        => $name,
            'created_at'  => date('Y-m-d H:i:s'),
            'ip'          => $ip
        ];
    }

    /**
     * Register a vote for given user on given product.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $user_id
     * @param  int $product_id
     * 
     * @return int Given product updated votes count.
     */

    public function vote(int $user_id, int $product_id): int
    {
        if (($user_id <= 0) || ($product_id <= 0)) {
            return [];
        }

        $insert_result = $this->execute(
            'product_hunt',
            'INSERT INTO `votes`(
                `product_id`,
                `user_id`,
                `created_at`
            )
            VALUES(?, ?, ?);',
            [$product_id, $user_id, date('Y-m-d H:i:s')]
        );


        $result = $this->execute(
            'product_hunt',
            'SELECT
                 COUNT(`product_id`) AS votes_count
             FROM
                 `votes`
             WHERE
                 `product_id` = ?;',
            [$product_id]
        );

        // if (!empty($result)) {
        //     $result = $result[0];
        // }

        return $result[0]['votes_count'];
    }

    /**
     * Register a comment for given user on given product.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $user_id
     * @param  int $product_id
     * @param  string $comment
     * 
     * @return array <pre><code>[
     *     'comment_id'     => int,
     *     'product_id'     => int,
     *     'user_id'        => int,
     *     'name'           => string,
     *     'created_at'     => string date('Y-m-d H:i:s'),
     *     'content'        => string
     * ] </code></pre>
     */
    public function comment(
        int $user_id,
        int $product_id,
        string $comment
    ): array {
        return [
            'comment_id'     => 1,
            'product_id'     => $product_id,
            'user_id'        => $user_id,
            'name'           => 'JeanPlaceHaut-le-Der',
            'created_at'     => date('Y-m-d H:i:s'),
            'content'        => $comment
        ];
    }
}

// * @return int|null Given product updated votes count or null if failed to
// *                  insert. Insertion failure is most likely to occur when
// *                  trying insert a vote that has already been registered.
