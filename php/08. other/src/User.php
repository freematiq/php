<?php
/**
 * Created by PhpStorm.
 * User: phantom
 * Date: 23/07/2017
 * Time: 16:34
 */

namespace Freematiq;


class User
{
    private $name;
    private $password;

    public function __toString()
    {
        return "User. Name: {$this->name}" . PHP_EOL;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}