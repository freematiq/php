<?php

namespace Freematiq;

class User
{
    private static $passLen = 6;

    function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }

    static function register($name, $password)
    {
        if (self::$passLen < mb_strlen($password)) {
        }
    }

    static public function getCount()
    {
        return User::$passLen; // error!
    }

    public function __call($name, $args) {
        print_r($name);
        print_r($args);
    }

    public function printName() {
        echo "{$this->name}\n";
    }
}
