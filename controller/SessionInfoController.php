<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/SessionInfo.php";


class SessionInfoController {

    public function getSessionsInfo() {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM session_info');
        $statement->execute();
        $sessions_info = $statement->fetchAll(PDO::FETCH_CLASS, 'SessionInfo');
        $connection = null;
        return $sessions_info;
    }

    public function findById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM session_info WHERE id = :id');
        $statement->execute(array('id' => $id));
        $statement->setFetchMode(PDO::FETCH_CLASS, 'SessionInfo');
        $session_info = $statement->fetch();
        $connection = null;
        return $session_info;
    }

    public function createSessionInfo(SessionInfo $session_info) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('INSERT INTO session_info(seat_number, row, status, session_id)
            VALUES (:seat_number, :row, :status, :session_id)');
        $statement->execute(array(
            'seat_number' => $session_info->seat_number,
            'row' => $session_info->row,
            'status' => $session_info->status,
            'session_id' => $session_info->session_id
        ));
        $connection = null;
    }

    public function updateSessionInfo(SessionInfo $session_info) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('UPDATE session_info SET 
            seat_number = :seat_number, 
            row = :row, 
            status = :status, 
            session_id = :session_id
            WHERE id = :id');
        $statement->execute(array(
            'seat_number' => $session_info->seat_number,
            'row' => $session_info->row,
            'status' => $session_info->status,
            'session_id' => $session_info->session_id,
            'id' => $session_info->id
        ));
        $connection = null;
    }

    public function deleteById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('DELETE FROM session_info WHERE id = :id');
        $statement->execute(array('id' => $id));
        $connection = null;
    }
}