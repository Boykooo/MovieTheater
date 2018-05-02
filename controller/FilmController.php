<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/Film.php";

class FilmController {

    public function getFilms() {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM film');
        $statement->execute();
        $films = $statement->fetchAll(PDO::FETCH_CLASS, 'Film');
        $connection = null;
        return $films;
    }

    public function findById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM film WHERE id = :id');
        $statement->execute(array('id' => $id));
        $statement->setFetchMode(PDO::FETCH_CLASS,  'Film');
        $film = $statement->fetch();
        $connection = null;
        return $film;
    }

    public function createFilm(Film $film) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('INSERT INTO film(name, start_date, end_date, pg, director, stars, genre, duration, description, production, img_href)
            VALUES (:name, :start_date, :end_date, :pg, :director, :stars, :genre, :duration, :description, :production, :img_href)');
        $statement->execute(array(
            'name' => $film->name,
            'start_date' => $film->start_date,
            'end_date' => $film->end_date,
            'pg' => $film->pg,
            'director' => $film->director,
            'stars' => $film->stars,
            'genre' => $film->genre,
            'duration' => $film->duration,
            'description' => $film->description,
            'production' => $film->production,
            'img_href' => $film->img_href
        ));
        $connection = null;
    }

    public function updateFilm(Film $film) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('UPDATE film SET 
            name = :name, 
            start_date = :start_date, 
            end_date = :end_date, 
            pg = :pg, 
            director = :director, 
            stars = :stars, 
            genre = :genre, 
            duration = :duration, 
            description = :description, 
            production = :production, 
            img_href = :img_href
            WHERE id = :id');
        $statement->execute(array(
            'name' => $film->name,
            'start_date' => $film->start_date,
            'end_date' => $film->end_date,
            'pg' => $film->pg,
            'director' => $film->director,
            'stars' => $film->stars,
            'genre' => $film->genre,
            'duration' => $film->duration,
            'description' => $film->description,
            'production' => $film->production,
            'img_href' => $film->img_href,
            'id' => $film->id
        ));
        $connection = null;
    }

    public function deleteById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('DELETE FROM film WHERE id = :id');
        $statement->execute(array('id' => $id));
        $connection = null;
    }

    public function getActualFilms() {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM film WHERE end_date >= CURDATE() ORDER BY start_date DESC');
        $statement->execute();
        $films = $statement->fetchAll(PDO::FETCH_CLASS, 'Film');
        $connection = null;
        return $films;
    }
}