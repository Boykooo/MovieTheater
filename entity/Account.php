<?php


class Account {
    private $id;
    private $email;
    private $firstname;
    private $lastname;
    private $reg_date;
    private $token;
    private $role;
    private $password;

    public function __get($attr) {
        if (isset($this->$attr))
            return $this->$attr;
        else {
            user_error("Attribute '" . $attr . "' is not found!");
            return null;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}
