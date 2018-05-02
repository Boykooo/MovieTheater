<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/Session.php";


class SessionController {

    public function getSessions() {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM session');
        $statement->execute();
        $sessions = $statement->fetchAll(PDO::FETCH_CLASS, 'Session');
        $connection = null;
        return $sessions;
    }

    public function findById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM session WHERE id = :id');
        $statement->execute(array('id' => $id));
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Session');
        $session = $statement->fetch();
        $connection = null;
        return $session;
    }

    public function createSession(Session $session) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('INSERT INTO session(date, film_id, hall_id)
            VALUES (:date, :film_id, hall_id)');
        $statement->execute(array(
            'date' => $session->date,
            'film_id' => $session->film_id,
            'hall_id' => $session->hall_id
        ));
        $connection = null;
    }

    public function updateSession(Session $session) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('UPDATE session SET 
            date = :date,
            film_id = :film_id,
            hall_id = :hall_id
            WHERE id = :id');
        $statement->execute(array(
            'date' => $session->date,
            'film_id' => $session->film_id,
            'hall_id' => $session->hall_id,
            'id' => $session->id
        ));
        $connection = null;
    }

    public function deleteById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('DELETE FROM session WHERE id = :id');
        $statement->execute(array('id' => $id));
        $connection = null;
    }
}