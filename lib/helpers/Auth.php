<?php
namespace Lib\Helpers;

use Lib\Helpers\Session;
use Lib\Helpers\Api;
use Lib\DB\DB;

class Auth {
    public static function guest(bool $api = false) {
        if(!$api) {
            if(Session::isset("id")) redirect("/account/dashboard");
        } else {
            if(Session::isset("id")) Api::error("You're already logged in.");
        }
    }

    public static function auth(bool $api = false) {
        if(!$api) {
            if(!Session::isset("id")) redirect("/account/login");
        } else {
            if(!Session::isset("id")) Api::error("Please login to perform this operation.");
        }
    }

    public static function user() {
        if(Session::isset("id")) {
            $user = DB::query("SELECT * FROM users WHERE id = ?", [Session::get("id")]);
            return $user->fetch(\PDO::FETCH_OBJ);
        } else return null;
    }
}