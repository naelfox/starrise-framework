<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\View;
use App\Models\Book;

class Home extends Controller
{
    public static function getHome()
    {
        $objBook = new Book;

        // return home view
        $content = View::render('pages/home', [
            'name' => $objBook->name,
            'description' =>  $objBook->description,
            'site' =>  $objBook->site
        ]);

        // return page view
        return self::getPage('Home', $content);
    }
}
