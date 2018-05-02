<?php


class Film {
    private $id;
    private $name;
    private $start_date;
    private $end_date;
    private $pg;
    private $director;
    private $stars;
    private $genre;
    private $duration;
    private $description;
    private $production;
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