<?php

namespace Example\Controllers;

use Example\Vue\Vue;

class Home
{

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

    public function showHome(){
        $shower = new Vue($this->eg);
        $shower->generer([]);
    }

    public function showDashboard(){
        $shower = new Vue($this->eg);
        $shower->generer([]);
    }

    public function showAuthentication($data){
        $shower = new Vue($this->eg);
        $shower->generer($data);
    }
}
