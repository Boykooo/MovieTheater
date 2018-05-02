<?php


class SessionInfo {

    private $id;
    private $seat_number;
    private $row;
    private $status;
    private $session_id;

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