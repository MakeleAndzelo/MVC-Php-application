<?php

use App\Core\App;

App::bind('config', require 'config.php');

App::bind('database',
    new QueryBuilder(
        Connection::make(App::get('config')['database'])
    )
);

function view($file, array $data = [])
{
    extract($data);

    require "app/views/".$file. ".view.php";
}

function redirect($path)
{
    header("Location: {$path}");
}