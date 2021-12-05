<?php
namespace Lib\DB;

class DB {
    public static $pdo;

    public static function init($dbname = "nanite", $username = "root", $password = "") {
        try {
            self::$pdo = new \PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
            self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            die("Something has went wrong, please contact a developer with the following error code: ERR01");
        }
    }

    public static function query(string $sql, array $parameters = []) {
        if(self::$pdo == null) {
            die("Something has went wrong, please contact a developer with the following error code and the location of the error (the URL): ERR02");
        } else {
            $query = self::$pdo->prepare($sql);
            $query->execute($parameters);

            return $query;
        }
    }

    public static function insert(string $table, array $parameters) {
        if(self::$pdo == null) {
            die("Something has went wrong, please contact a developer with the following error code and the location of the error (the URL): ERR02");
        } else {
            $names = [];
            $bindings = [];
            $values = [];

            foreach($parameters as $i => $b) {
                array_push($bindings, "?");
                array_push($names, $i);

                array_push($values, $b);
            }

            $names = join(",", $names);
            $bindings = join(",", $bindings);

            $query = self::query("INSERT INTO users ($names) VALUES ($bindings)", $values);
        }
    }
}