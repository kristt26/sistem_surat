<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['title'] = "Home";
        $data['icon'] = "fa fa-home";
        return view('home', $data);
    }
}
