<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data['_view'] = view("home");
        $data['title'] = "Home";
        return view('layout', $data);
    }
}
