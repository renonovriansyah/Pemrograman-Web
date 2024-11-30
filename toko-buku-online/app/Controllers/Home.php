<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function chart(){
        return view('chart');
    }

    public function checkout(){
        return view('checkout');
    }

    public function submit(){
        return view ('submit');
    }
}
