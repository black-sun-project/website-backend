<?php
namespace Lib\Helpers;

class Session {
    public static function init($name = "nanite_session") {
        session_name($name);
        session_start();
        ob_flush();
    }

    public static function isset($name) {
        return (isset($_SESSION[$name]));
    }

    public static function set($name, $value) {
        $_SESSION[$name] = $value;
    }

    public static function get($name) {
        if(self::isset($name)) {
            return $_SESSION[$name];
        } else {
            return null;
        }
    }
}