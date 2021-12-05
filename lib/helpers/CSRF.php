<?php
namespace Lib\Helpers;

use Lib\Helpers\Session;

class CSRF {
    public static function generate() {
        if(!Session::isset("csrf_token")) Session::set("csrf_token", bin2hex(random_bytes(32)));
    }

    public static function validate() {
        if(!hash_equals(Session::get("csrf_token"), $_POST["token"])) Api::error("419");
    }
}