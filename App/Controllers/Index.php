<?php

namespace App\Controllers;

use App\Controller;

class Index extends Controller
{

    public function action()
    {
        $this->view->products = \App\Models\Product::findAll();
        $this->view->display(__DIR__ . '/../Templates/index.php');
    }

}