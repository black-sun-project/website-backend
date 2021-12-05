<?php
use Lib\Router;
use Lib\Templater;
use Lib\DB\DB;
use Lib\Helpers\Session;
use Lib\Helpers\CSRF;
use Lib\Helpers\Auth;

Router::init();
Templater::init();
DB::init();
Session::init();
CSRF::generate();

Templater::$twig->addGlobal("csrf", Session::get("csrf_token"));
Templater::$twig->addGlobal("auth_user", Auth::user());

include $_SERVER["DOCUMENT_ROOT"] . "/app/routes/general.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/routes/api.php";

Router::$router->addRoute("/*/", function() {
    echo "404 not found";
});

Router::$router->callRoute($_SERVER['REQUEST_URI']);