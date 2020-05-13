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
     * Query database and returns an array of most recent products.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $count  How many products to return (default = 10).
     * @param  int $offset How many products to skip   (default = 0)
     *                     Use for pagination.
     * 
     * @return array <pre><code> [
     *     'product_id'     => int,
     *     'name'           => string,
     *     'created_at'     => string date('Y-m-d H:i:s'),
     *     'website'        => string,
     *     'summary'        => string,
     *     'thumbnail'      => string,
     *     'votes_count'    => int,
     *     'comments_count' => int
     * ] </code></pre>
     */
    public function getFreshProducts(int $count = 10, int $offset = 0): array
    {
        return [];
    }

    /**
     * Query database and returns an array of most popular products.
     * 
     * @api
     * @todo Implement query
     * 
     * @param  int $count  How many products to return (default = 10).
     * @param  int $offset How many products to skip   (default = 0)
     *                     Use for pagination.
     * 
     * @return array <pre><code> [
     *     'product_id'     => int,
     *     'name'           => string,
     *     'created_at'     => string date('Y-m-d H:i:s'),
     *     'website'        => string,
     *     'summary'        => string,
     *     'thumbnail'      => string,
     *     'votes_count'    => int,
     *     'comments_count' => int
     * ] </code></pre>
     */
    public function getPopularProducts(int $count = 10, int $offset = 0): array
    {
        return [];
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
