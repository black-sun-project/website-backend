<?php
namespace Lib;

class Templater {
    public static $twig;

    public static function init() {
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER["DOCUMENT_ROOT"] . '/app/views');
        self::$twig = new \Twig\Environment($loader, [
            'cache' => $_SERVER["DOCUMENT_ROOT"] . '/cache',
            'auto_reload' => true
        ]);
    }
}