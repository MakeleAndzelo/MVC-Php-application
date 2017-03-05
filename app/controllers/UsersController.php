<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{
    public function index()
    {
        $names = App::get('database')->selectAll("names");

        return view('index', compact("names"));
    }

    public function store()
    {
        App::get('database')->insert('names', [
            'name' => $_POST['name']
        ]);

        redirect("/users");
    }

}