<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/Ticket.php";



class TicketController {

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
        $statement = $connection->prepare('INSERT INTO ticket(session_id, account_id)
            VALUES (:session_id, :account_id)');
        $statement->execute(array(
            'session_id' => $ticket->session_id,
            'account_id' => $ticket->account_id
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
            'session_id' => $ticket->session_id,
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