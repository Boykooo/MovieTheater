<?php

class Event {

    private $id;
    private $name;
    private $date;
    private $time;
    private $duration;
    private $description;
    private $img_href;

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