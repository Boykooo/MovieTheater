<?php

class TestController
{
    public function getData() {
        $array = [
            "first key" => "first value",
            "second key" => "second value"
        ];

        return $array;
    }
}