<?php

namespace Example\Controllers;

use Example\Vue\Vue;
use Example\Modele\Envelope;

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
        $model = new Envelope();
        $shower = new Vue($this->eg);
        $shower->generer(['envelopes' => $model->getAll()]);
    }

    public function showAuthentication($data){
        $shower = new Vue($this->eg);
        $shower->generer($data);
    }
}
