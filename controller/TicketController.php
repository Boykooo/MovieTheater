<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/Ticket.php";
require_once "$root/controller/AuthController.php";
require_once "$root/dto/TicketWrapper.php";



class TicketController {

    public function removeTicket($sessionInfoId, $accountId) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('DELETE FROM ticket WHERE session_info_id = :sessionInfoId and account_id = :accountId');
        $statement->execute([
            'sessionInfoId' => $sessionInfoId,
            'accountId' => $accountId
        ]);
        $connection = null;
    }

    public function getConvertedTicketsByCurrentUser() {
        $authController = new AuthController();
        $account = $authController->authenticate();

        $connection = Database::getConnection();
        $statement = $connection->prepare(
            'SELECT si.id as session_info_id, fm.name, si.seat_number, si.row, si.cost, ss.date, ss.time, ss.hall_id
            FROM ticket as tk 
                JOIN session_info as si on tk.session_info_id = si.id
                JOIN session as ss on si.session_id = ss.id
                JOIN film as fm on fm.id = ss.film_id
            where tk.account_id = :accountId'
        );
        $statement->execute(['accountId' => $account->id]);
        $tickets = $statement->fetchAll(PDO::FETCH_CLASS, 'TicketWrapper');
        $connection = null;
        return $tickets;
    }

    public function getTickets() {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM ticket');
        $statement->execute();
        $tickets = $statement->fetchAll(PDO::FETCH_CLASS, 'Ticket');
        $connection = null;
        return $tickets;
    }

    public function findById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM ticket WHERE id = :id');
        $statement->execute(array('id' => $id));
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
        $ticket = $statement->fetch();
        $connection = null;
        return $ticket;
    }

    public function createTicket(Ticket $ticket) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('INSERT INTO ticket(session_info_id, account_id, paid)
            VALUES (:session_info_id, :account_id, :paid)');
        $statement->execute(array(
            'session_info_id' => $ticket->session_info_id,
            'account_id' => $ticket->account_id,
            'paid' => $ticket->paid
        ));
        $connection = null;
    }

    public function updateTicket(Ticket $ticket) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('UPDATE ticket SET 
            session_id = :session_id, 
            account_id = :account_id
            WHERE id = :id');
        $statement->execute(array(
            'session_info_id' => $ticket->session_info_id,
            'account_id' => $ticket->account_id,
            'id' => $ticket->id
        ));
        $connection = null;
    }

    public function deleteById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('DELETE FROM ticket WHERE id = :id');
        $statement->execute(array('id' => $id));
        $connection = null;
    }
}