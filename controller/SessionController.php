<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/Session.php";
require_once "$root/controller/HallController.php";
require_once "$root/controller/SessionInfoController.php";

class SessionController {

    private $hallController;
    private $sessionInfoController;

    public function __construct() {
        $this->hallController = new HallController();
        $this->sessionInfoController = new SessionInfoController();
    }


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
        $statement = $connection->prepare('INSERT INTO session(date, time, cost, film_id, hall_id)
            VALUES (:date, :time, :cost, :film_id, :hall_id)');
        $statement->execute(array(
            'date' => $session->date,
            'time' => $session->time,
            'cost' => $session->cost,
            'film_id' => $session->film_id,
            'hall_id' => $session->hall_id
        ));
        $session->id = $connection->lastInsertId();
        $connection = null;
    }

    public function updateSession(Session $session) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('UPDATE session SET 
            date = :date,
            time = :time,
            cost = :cost,
            film_id = :film_id,
            hall_id = :hall_id
            WHERE id = :id');
        $statement->execute(array(
            'date' => $session->date,
            'time' => $session->time,
            'cost' => $session->cost,
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

    public function findByFilmId($film_id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM session WHERE film_id = :film_id');
        $statement->execute(array('film_id' => $film_id));
        $sessions = $statement->fetchAll(PDO::FETCH_CLASS, 'Session');
        $connection = null;
        return $sessions;
    }

    public function findByFilmIdDate($film_id, $date) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM session WHERE film_id = :film_id AND date = :date');
        $statement->execute(array(
            'film_id' => $film_id,
            'date' => $date
        ));
        $sessions = $statement->fetchAll(PDO::FETCH_CLASS, 'Session');
        $connection = null;
        return $sessions;
    }

    public function createSessionWithSessionsInfo(Session $session) {
        $this->createSession($session);
        $this->createSessionsInfoForSession($session);
    }

    public function updateSessionWithSessionsInfo(Session $session) {
        $this->updateSession($session);
        $this->updateSessionsInfoForSession($session);
    }

    public function deleteByIdWithSessionsInfo($id) {
        $this->deleteById($id);
        $this->sessionInfoController->deleteBySessionId($id);
    }

    private function createSessionsInfoForSession(Session $session) {
        $hall = $this->hallController->findById($session->hall_id);
        for ($i = 1; $i <= $hall->row_count; $i++) {
            for ($j = 1; $j <= $hall->seat_count / $hall->row_count; $j++) {
                $session_info = new SessionInfo();
                $session_info->seat_number = $j;
                $session_info->row = $i;
                $session_info->status = "FREE";
                $session_info->cost = $session->cost;
                $session_info->session_id = $session->id;
                $this->sessionInfoController->createSessionInfo($session_info);
            }
        }
    }

    private function updateSessionsInfoForSession(Session $session) {
        $session_info_list = $this->sessionInfoController->findBySessionId($session->id);
        foreach ($session_info_list as $session_info) {
            $session_info->cost = $session->cost;
            $this->sessionInfoController->updateSessionInfo($session_info);
        }
    }
}