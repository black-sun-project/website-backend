<?php
namespace Lib\Helpers;

class Api {
    public static $gen_msg = null;
    public static $errors = [];

    public static function display_all_errors() {
        die(json_encode([
            "error" => true,
            "messages" => $errors
        ]));
    }

    public static function error($message = "") {
        die(json_encode([
            "error" => true,
            "message" => (self::$gen_msg == null) ? $message : self::$gen_msg
        ]));
    }

    public static function success() {
        self::$gen_msg = null;

        die(json_encode([
            "error" => false
        ]));
    }
}