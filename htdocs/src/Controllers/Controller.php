<?php

/**
 * 
 */

declare(strict_types=1);

namespace Controllers;

use Models\Model;
use Views\View;

/**
 * 
 */
abstract class Controller
{
    public $args = [];

    protected $model;
    protected $view;
    protected $layout = 'Minimal';

    protected $rendered_page = '';

    public static function bar()
    {
        echo "test\n";
    }
    
    public function __construct(array $args = [])
    {
        $this->args = $args;

        /* Get default associated view, model name */
        $associated_class = get_class($this);
        $namespace_end = strrpos($associated_class, '\\');
        $associated_class = substr($associated_class, $namespace_end + 1);

        /**
         * note 
         *   Store class names but defer loading
         *   Allow something downstream to change the associated model/view
         *   Lazy load -> when and if needed at all
         */
        $this->args['model'] = $associated_class;
        $this->args['view'] = $associated_class;
    }

    /**
     * 
     */
    public function set(array $args): self
    {
        $this->args = array_merge(
            $this->args,
            $args
        );
        return $this;
    }

    /**
     * 
     */
    public function loadModel(): Model
    {
        $model_name = '\Models\\' . $this->args['model'];
        // unset($this->args['model']);
        $this->model = new $model_name($this);

        return $this->model;
    }
    /**
     * 
     */
    public function loadView(): View
    {
        $view_name = '\Views\\' . $this->args['view'];
        // unset($this->args['view']);
        $this->view = new $view_name($this);

        return $this->view;
    }

    /**
     * note
     *   Output buffering is no longer required as everything is composed and
     *   rendered before emitting the page once
     */
    public function serve(): self
    {
        /* import collected 'variables' in current context */
        // extract($this->args);

        /* output buffering ON */
        // ob_start();
        $computed_content = ($this->view ?? $this->loadView())
            ->compose()
            ->render();

        /* view may set the layout */
        $layout_name = '\Layouts\\' . $this->layout;
        $layout = new $layout_name($computed_content);

        $rendered_page = $layout->render();
        echo $rendered_page;

        /* keep it around for optional caching */
        $this->rendered_page = $rendered_page;

        /* test and placeholder for deferred components ----------------------*/
        /**
         *   - [ ] Consider this is probably only useful for components that
         *         take a while to render
         *   - [ ] Consider using Js/Ajax to make that part asynchronous,
         *         especially if it hits DB
         */
        /* optional output buffering */
        // // if (ob_get_level() == O) {ob_start()};

        // for ($i = 0; $i < 3; $i++) {
        //     echo '<h2>DEFERRED COMPONENT PLACEHOLDER</h2>';
        //     echo '<img src="resources/images/spinner.svg" alt="loading !">';
        //     /**
        //      * note
        //      *   Some padding may be necessary to force the webserver and
        //      *   client browser to push current output.
        //      * 
        //      *   Client browser have different schemes for output bufffering
        //      */
        //     echo str_pad('', 4096);
        //     // ob_flush();
        //     flush();
        //     sleep(1);
        // }
        // // ob_end_flush();

        /* close the session -------------------------------------------------*/
        // session_write_close();
        /**
         * todo
         *   - [x] Use Js/Ajax
         */

        /* output buffering OFF */
        // echo ob_get_clean();

        return $this;
    }

    /**
     * note
     *   May be called on a Controller who never (or not yet) received args,
     *   in which case it does nothing
     */
    public function cache(): self
    {

        if (isset($this->args['cached_file'])) {
            $cached_file = fopen($this->args['cached_file'], 'w');
            fwrite($cached_file, $this->rendered_page);
            fclose($cached_file);
            // file_put_contents($this->args['cached_file'], $this->rendered_page);
        }
        return $this;
    }
    /**
     * note
     *   Prepend all actions meant to be callable by a request with 'run'
     */
    abstract public function runDefault(array $args);
}
