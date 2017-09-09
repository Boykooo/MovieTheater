<?php

require_once "../service/Database.php";

class FilmController
{
    private $conn;

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

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function getFilms()
    {
        $query = "select * from film";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $films = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $item = array(
                "id" => $row['id'],
                "name" => $row['name'],
                "start_date" => $row['start_date'],
                "end_date" => $row['end_date'],
                "pg" => $row['pg'],
                "director" => $row['director'],
                "stars" => $row['stars'],
                "genre" => $row['genre'],
                "duration" => $row['duration'],
                "description" => $row['description'],
                "production" => $row['production']
            );

            array_push($films, $item);
        }

        return $films;
    }

    public function getOneFilm($id) {
        $query = "select * from film where id = $id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $film = null;
        if ($row != null) {
            $film = array(
                "id" => $row['id'],
                "name" => $row['name'],
                "start_date" => $row['start_date'],
                "end_date" => $row['end_date'],
                "pg" => $row['pg'],
                "director" => $row['director'],
                "stars" => $row['stars'],
                "genre" => $row['genre'],
                "duration" => $row['duration'],
                "description" => $row['description'],
                "production" => $row['production']
            );
        }

        return $film;
    }
}