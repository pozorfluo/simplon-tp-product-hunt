<?php

/**
 * 
 */

declare(strict_types=1);

namespace Controllers;

use Models\ProductHuntAPI;

/**
 * 
 */
class Home extends Controller
{
    /**
     * 
     */
    public function runDefault(array $args = []): void
    {

        /**
         * note
         *   Use the dispatcher to route requests to either pages or RESTish API
         * 
         *   Not all pages being built around the MVC setup for this exercise :
         *     
         *     - Short-circuit everything where needed to serve Hamza's pages.
         *     
         *     - Make a ProductHuntAPI instance available for use inside
         *       Hamza's pages.
         */
        
        $this->set($args);
        
        $producthunt_api = ProductHuntAPI::fromConfig($this->args['db_configs']);
        
        require ROOT . 'src/Pages/home.php';


        // $this->serve();
    }
}
