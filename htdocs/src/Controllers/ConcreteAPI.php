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
class ConcreteAPI extends API
{
    protected $timeout = 30; /* seconds */
    protected $cache_path = ROOT . 'cache/minichat.buffer';
    /**  
     *  Minichat
     */
    public function runDefault(array $args = []): void
    {

        /* set model, args, ...then call() */
        $this->set($args);
        $this->call();
        // echo '<pre>'.var_export($this->args, true).'</pre><hr />';
    }

    /**  
     *  Minichat long-polling wrapper for runDefault or serving cached content
     * 
     *  note
     *    Keeping many concurrent php process alive is probably a terrible idea
     *    Let's find out ! ::wink::
     * 
     *  todo
     *    - [ ] Investigate why the client may hang on some request errors
     */
    public function runLong(array $args = []): void
    {
        $request_time = time();
        
        // echo 'runLong()';
        /* cache exists, ok for long poll */
        if (is_file($this->cache_path)) {
            // echo ' cache exists, ok for long poll <br />';
            /* wait for something fresh to send back or timeout expiration */
            while ((time() - $request_time) < $this->timeout) {
                clearstatcache(true, $this->cache_path);
                /* something happened since the request came in */
                if ($request_time < filemtime($this->cache_path)) {
                    break;
                }
                sleep(1); /* seconds */
            }

            // echo 'Serving Cached ! <br />';
            // $cached_content = json_decode(
            //     file_get_contents($this->cache_path),
            //     true
            // );
            $status_code = 200;
            $status = self::status($status_code);
            header("HTTP/1.1 {$status_code} {$status}");
            echo file_get_contents($this->cache_path);
            // $this->emit($cached_content, 200);
        } else {
            /* no cached content found, must serve fresh */
            // echo 'Serving Fresh ! <br />';
            $this->runDefault($args);
        }
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
