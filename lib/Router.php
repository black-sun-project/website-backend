<?php
namespace Lib;

class Router {
    public static $router;

    public static function init() {
        self::$router = new \Mezon\Router\Router();
    }
}