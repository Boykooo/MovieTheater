<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once "$root/service/Database.php";
require_once "$root/entity/Event.php";

class EventController {

    public function getEvents() {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM event');
        $statement->execute();
        $events = $statement->fetchAll(PDO::FETCH_CLASS, 'Event');
        $connection = null;
        return $events;
    }

    public function findById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('SELECT * FROM event WHERE id = :id');
        $statement->execute(array('id' => $id));
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Event');
        $event = $statement->fetch();
        $connection = null;
        return $event;
    }

    public function createEvent(Event $event) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('INSERT INTO event(name, date, time, duration, description, img_href)
            VALUES (:name, _date, :time, :duration, :description, :img_href)');
        $statement->execute(array(
            'name' => $event->name,
            'date' => $event->date,
            'time' => $event->time,
            'duration' => $event->duration,
            'description' => $event->description,
            'img_href' => $event->img_href
        ));
        $connection = null;
    }

    public function updateEvent(Event $event) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('UPDATE event SET 
            name = :name, 
            date = :date, 
            time = :time, 
            duration = :duration, 
            description = :description, 
            img_href = :img_href
            WHERE id = :id');
        $statement->execute(array(
            'name' => $event->name,
            'date' => $event->date,
            'duration' => $event->duration,
            'description' => $event->description,
            'img_href' => $event->img_href,
            'id' => $event->id
        ));
        $connection = null;
    }

    public function deleteById($id) {
        $connection = Database::getConnection();
        $statement = $connection->prepare('DELETE FROM event WHERE id = :id');
        $statement->execute(array('id' => $id));
        $connection = null;
    }
}