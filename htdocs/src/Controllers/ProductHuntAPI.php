<?php

/**
 * 
 */

declare(strict_types=1);

namespace Controllers;

use Models\Model;

/**
 * 
 */
class ProductHuntAPI extends API
{
    protected $timeout = 30; /* seconds */
    // protected $cache_path = ROOT . 'cache/ConcreteAPI.buffer';

    public function runDefault(array $args = []): void
    {

        /* set model, args, ...then call() */
        $this->set($args);
        $this->call();
    }

    
    /**
     * note
     *   Overriding Controller->cache()
     */
    public function cache(): Controller
    {
        if ($this->rendered_page !== '') {
            $cached_file = fopen($this->cache_path, 'w');
            fwrite($cached_file, $this->rendered_page);
            fclose($cached_file);
        }

        return $this;
    }
}
