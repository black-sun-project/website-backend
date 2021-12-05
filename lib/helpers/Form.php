<?php
namespace Lib\Helpers;

use Lib\Helpers\Api;

class Form {
    public static function checkIsset(array $parameters, bool $is_post = false) {
        if($is_post) array_push($parameters, "token");

        foreach($parameters as $i=>$b) {
            if(!isset($_POST[$b])) Api::error("Required parameters not set");
            else continue;
        }
    }
}