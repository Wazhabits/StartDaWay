<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteView extends ViewController
{
    public function index() {
        return $this->IndexView();
    }
}
