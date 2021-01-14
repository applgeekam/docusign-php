<?php

namespace Example\Controllers;

use Example\Services\RouterService;
use Example\Vue\Vue;

class Test
{
    /** RouterService */
    private $routerService;

    private $eg;  # Reference (and URL) for this example

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($page)
    {
      $this->eg = ucfirst($page);
    }

    public function display(){
        $shower = new Vue($this->eg);
        $shower->generer([]);
    }
}
