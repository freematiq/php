<?php

namespace Freematiq;

class Manager extends User
{

    public function __construct($name, $passwd)
    {
        parent::__construct($name, $passwd);
    }

    public function printName() {
        echo "Mr. {$this->name}\n";
    }
}
