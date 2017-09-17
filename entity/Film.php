<?php

class Film
{
    public $id;
    public $name;
    public $start_date;
    public $end_date;
    public $pg;
    public $director;
    public $stars;
    public $genre;
    public $duration;
    public $description;
    public $production;
    public $img_href;

    public function __construct($id, $name, $start_date, $end_date, $pg, $director, $stars, $genre, $duration, $description, $production, $img_href)
    {
        $this->id = $id;
        $this->name = $name;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->pg = $pg;
        $this->director = $director;
        $this->stars = $stars;
        $this->genre = $genre;
        $this->duration = $duration;
        $this->description = $description;
        $this->production = $production;
        $this->img_href = $img_href;
    }
    }