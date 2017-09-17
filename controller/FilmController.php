<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/Film.php";

class FilmController
{
    private $conn;

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
            $item =$this->buildFilm($row);
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
            $film = $this->buildFilm($row);
        }

        return $film;
    }

    public function getLast20Films() {
        $date = date('Y-m-d', time());
        $query = "SELECT * FROM film WHERE start_date > $date ORDER BY start_date DESC LIMIT 20;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $films = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $item =$this->buildFilm($row);
            array_push($films, $item);
        }

        return $films;
    }

    public function buildFilm($row) {
        return array(
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
            "production" => $row['production'],
            "img_href" => $row['img_href']
        );
    }

    public function createFilm(Film $film) {
        $query = "insert into film(name, start_date, end_date, pg, director, stars, genre, duration, description, production, img_href)
                  VALUES (
                  '$film->name', 
                  '$film->start_date',
                  '$film->end_date',
                  '$film->pg',
                  '$film->director',
                  '$film->stars',
                  '$film->genre',
                  '$film->duration',
                  '$film->description',
                  '$film->production',
                  '$film->img_href'
                  )";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $stmt->fetch(PDO::FETCH_ASSOC);
    }
}