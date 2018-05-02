<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/Hall.php";


class HallController {

    public function getHalls() {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM hall');
        $statement->execute();
        $halls = $statement->fetchAll(PDO::FETCH_CLASS, 'Hall');
        $connection = null;
        return $halls;
    }

    public function findById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM hall WHERE id = :id');
        $statement->execute(array('id' => $id));
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Hall');
        $hall = $statement->fetch();
        $connection = null;
        return $hall;
    }

    public function createHall(Hall $hall) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('INSERT INTO hall(name, seat_count)
            VALUES (:name, :seat_count)');
        $statement->execute(array(
            'name' => $hall->name,
            'seat_count' => $hall->seat_count
        ));
        $connection = null;
    }

    public function updateHall(Hall $hall) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('UPDATE hall SET 
            name = :name, 
            seat_count = :seat_count
            WHERE id = :id');
        $statement->execute(array(
            'name' => $hall->name,
            'seat_count' => $hall->seat_count,
            'id' => $hall->id
        ));
        $connection = null;
    }

    public function deleteById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('DELETE FROM hall WHERE id = :id');
        $statement->execute(array('id' => $id));
        $connection = null;
    }
}