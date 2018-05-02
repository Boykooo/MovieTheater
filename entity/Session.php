<?php


class Session {

    private $id;
    private $date;
    private $time;
    private $film_id;
    private $hall_id;

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