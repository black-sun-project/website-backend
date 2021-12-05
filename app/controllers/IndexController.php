<?php
namespace App\Controllers;

use Lib\Helpers\Auth;
use Lib\Templater;

class IndexController {
    public static function view() {
        Auth::guest();
        echo Templater::$twig->render("index.html");
    }
}