<?php


declare(strict_types=1);

namespace Models;

use Exception;
use Helpers\DBConfig;

/**
 * ProductHunt RESTish API
 * 
 *      > set status_code
 * 
 *      > set data
 * 
 * note
 * 
 *     Prepend all model modes of operation meant to be callable by 
 *     a external request with 'op'.
 * 
 *     Forbid model method name starting with 'op' before prepending 
 *     wether it is meant to be callable by an external or not.
 *   
 *   e.g.,
 * 
 *     operate() is FORBIDDEN  
 *       -> could be requested maliciously with a request for 'erate'
 * 
 *     open() is FORBIDDEN  
 *       -> could be requested maliciously with a request for 'en'
 */
class ProductHuntAPI extends DBPDO
{

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
                'product_id'     => 2,
                'name'           => 'Buy For Life',
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
        return [
            [
                'product_id'     => 4,
                'name'           => 'Wedding Planning Assistant',
                'created_at'     => '2020-05-10 07:01:00',
                'website'        => 'https://rewind.netlify.app/?ref=producthunt',
                'summary'        => 'Your bookmarks, by date, with thumbnails and instant search',
                'thumbnail'      => 'public/images/products/thumbnails/1_Rewind.webp',
                'votes_count'    => 0,
                'comments_count' => 0
            ], [
                'product_id'     => 2,
                'name'           => 'Buy For Life',
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
        return [
            [
                'category_id'    => 1,
                'name'           => 'Tech',
            ],
            [
                'category_id'    => 2,
                'name'           => 'Dev Tools',
            ]
        ];
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
        return [
            'category_id'    => $category_id,
            'name'           => 'Tech',
            'summary'        => 'Hard, soft, high, low. Forward !',
            'thumbnail'      => 'public/images/products/thumbnails/virtual-reality.svg'
        ];
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
    public function getUserById(string $user_id): array
    {
        return [
            'user_id'     => $user_id,
            'name'        => 'JeanPlaceHaut-le-Der',
            'created_at'  => '2020-05-10 07:01:00',
            'ip'          => '127.0.0.1'
        ];
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
        return [
            'user_id'     => 1,
            'name'        => $name,
            'created_at'  => '2020-05-10 07:01:00',
            'ip'          => '127.0.0.1'
        ];
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
        return 1;
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

    /**
     * Return last few messages
     *
     * todo
     *   - [ ] Translate PDO/MySQL errors into meaningful response for the
     *         RESTish API
     *   - [ ] Add a json cache/buffer
     */
    public function opGET(): ?array
    {
        $msg_count = $this->controller->args['maxResults'] ?? 5;
        // $order_by = $this->args['orderBy'] ?? 'created_at';
        try {
            $results = $this->execute(
                'minichat',
                'SELECT
                    `messages`.`created_at`,
                    `users`.`nickname`,
                    `messages`.`message`
                 FROM
                    `messages`
                 INNER JOIN `users` ON `messages`.`user_id` = `users`.`id`
                 ORDER BY
                    `messages`.`created_at` DESC
                 LIMIT 
                    ?',
                [$msg_count]
            );

            if (empty($results)) {
                /* No Content */
                $this->controller->set(['status_code' => 204]);
            } else {
                /* OK */
                $this->controller->set(['status_code' => 200]);
            }
            /* useful only if you want to do more than emit json */
            // $this->controller->set(['data' => $results]);

            return $results;
        } catch (Exception $e) {
            /*
             * todo
             *   - [ ] Have a look at PDO statement errorInfo()
             */
            /* Internal Server Error */
            $this->controller->set(['status_code' => 500]);
            return [$e->getMessage()];
        }
    }

    /**
     * 
     */
    public function opPOST(): ?array
    {
        /*
         * Insert new message
         *   -> Return last few messages
         * todo
         *   - [ ] Learn how to get client ip
         *     + [ ] See https://stackoverflow.com/questions/3003145/how-to-get-the-client-ip-address-in-php
         *   - [ ] Check user exists
         *     + [ ] Create user if necessary
         */

        /* mock some data until it's implemented */
        $ip = '127.0.0.1';

        /* retrieve request body */
        $post_body = json_decode(file_get_contents('php://input'), true);
        $this->controller->set(['post_body' => $post_body]);

        $msg_count = $this->controller->args['maxResults'] ?? 5;


        // echo '<pre>'.var_export($this->args, true).'</pre><hr />';
        try {
            $results = $this->execute(
                'minichat',
                'INSERT INTO `messages`(
                    `user_id`,
                    `message`,
                    `ip_address`,
                    `created_at`
                )
                VALUES
                    (?, ?, ?, ?)',
                [
                    1,
                    $this->args['post_body']['message'],
                    $ip,
                    date('Y-m-d H:i:s')
                ]

            );

            /*
             * todo
             *   - [ ] Append to minichat.buffer
             *   - [ ] Remove call to opGET
             *   - [ ] Insert into db only when buffer reaches a certain size
             */
            $results = $this->opGET();
            $this->controller->set(['status_code' => 201]);

            /* useful only if you want to do more than emit json */
            // $this->controller->set(['data' => $results]);

            return $results;
        } catch (Exception $e) {
            /*
             * todo
             *   - [ ] Have a look at PDO statement errorInfo()
             */
            /* Internal Server Error */
            $this->controller->set(['status_code' => 500]);
            return [$e->getMessage()];
            // return null;
        }
    }

    /**
     *
     */
    public function opPUT(): ?array
    {
        $this->controller->set(['status_code' => 405]);
        // $this->args['status_code'] = 405;
        return ['PUT : not implemented yet'];
    }

    /**
     * 
     */
    public function opDELETE(): ?array
    {
        $this->controller->set(['status_code' => 405]);
        // $this->args['status_code'] = 405;
        return ['DELETE : not implemented yet'];
    }
}
