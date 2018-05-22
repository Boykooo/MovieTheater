<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/SessionInfo.php";
require_once "$root/controller/AuthController.php";
require_once "$root/controller/TicketController.php";

class SessionInfoController {

    public function cancelReservation() {
        $authControoler = new AuthController();
        $account = $authControoler->authenticate();
        $sessionInfoId = $_POST['session_info_id'];
        $this->updateStatusByIds(array($sessionInfoId), 'FREE');
        $ticketController = new TicketController();
        $ticketController->removeTicket($sessionInfoId, $account->id);
    }

    public function getSessionsInfo() {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM session_info');
        $statement->execute();
        $sessions_infos = $statement->fetchAll(PDO::FETCH_CLASS, 'SessionInfo');
        $connection = null;
        return $sessions_infos;
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

    public function reservation() {
        $authController = new AuthController();
        $account = $authController->authenticate();
        $sessionInfoIds = json_decode($_POST['sessionInfoIds']);
        $this->updateStatusByIds($sessionInfoIds, 'RESERVATION');
        $ticketController = new TicketController();
        foreach ($sessionInfoIds as $sessionInfoId) {
            $ticket = new Ticket();
            $ticket->session_info_id = $sessionInfoId;
            $ticket->account_id = $account->id;
            $ticket->paid = false;
            $ticketController->createTicket($ticket);
        }
    }

    private function updateStatusByIds($sessionInfoIds, $newStatus) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('UPDATE session_info SET status = :status WHERE id = :id');
        $statement->bindParam(':status', $newStatus);
        foreach ($sessionInfoIds as $sessionInfoId) {
            $statement->bindParam(':id', $sessionInfoId);
            $statement->execute();
        }
        $connection = null;
    }

    public function findBySessionId($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM session_info WHERE session_id = :id');
        $statement->execute(array('id' => $id));
        $session_infos = $statement->fetchAll(PDO::FETCH_CLASS, 'SessionInfo');
        $connection = null;
        return $session_infos;
    }

    public function createSessionInfo(SessionInfo $session_info) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('INSERT INTO session_info(seat_number, row, status, cost, session_id)
            VALUES (:seat_number, :row, :status, :cost, :session_id)');
        $statement->execute(array(
            'seat_number' => $session_info->seat_number,
            'row' => $session_info->row,
            'status' => $session_info->status,
            'cost' => $session_info->cost,
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
            cost = :cost,
            session_id = :session_id
            WHERE id = :id');
        $statement->execute(array(
            'seat_number' => $session_info->seat_number,
            'row' => $session_info->row,
            'status' => $session_info->status,
            'cost' => $session_info->cost,
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

    public function deleteBySessionId($session_id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('DELETE FROM session_info WHERE session_id = :session_id');
        $statement->execute(array('session_id' => $session_id));
        $connection = null;
    }
}