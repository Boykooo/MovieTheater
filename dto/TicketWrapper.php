<?php

class TicketWrapper {

    private $session_info_id;
    private $name;
    private $seat_number;
    private $row;
    private $cost;
    private $date;
    private $time;
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