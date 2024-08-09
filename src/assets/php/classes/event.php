<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of event
 *
 * @author lha
 */
class event {
    function __construct($db) {
        $this->db = $db;
    }
    public function getEvent($eventID) {
        $event = $this->db->query("SELECT name,date FROM scoreboard_events WHERE ID = ?", $eventID)->fetchArray();
        return $event;
    }
    public function getAllEvents() {
        $events = $this->db->query('SELECT * FROM scoreboard_events ORDER BY date DESC')->fetchAll();
        return $events;
    }
    public function getEventPerformance($eventID) {
        $performance = $this->db->query("SELECT * FROM scoreboard_eventperformance WHERE eventid = ? ORDER BY score DESC", $eventID)->fetchAll();
        return $performance;
    }
    public function newEvent($eventname, $eventdate) {
        $eventname = cleanup::cleanString($eventname);
        $eventdate = cleanup::cleanString($eventdate);
        
        $this->db->query("INSERT INTO scoreboard_events (name, date) VALUES (?,?)", $eventname, $eventdate);
        $eventid = $this->db->lastInsertID();
        return $eventid;
    }
    public function insertEventPerformance($eventid,$personid, $score, $place) {
        $eventid = cleanup::cleanString($eventid);
        $score = cleanup::cleanString($score);
        $place = cleanup::cleanString($place);
        
        $this->db->query("INSERT INTO scoreboard_eventperformance (eventid, personid, score, place) VALUES (?,?,?,?)", $eventid, $personid, $score, $place);
    }
    public function changeEventName($id, $name) {
        $name = cleanup::cleanString($name);
        $this->db->query("UPDATE scoreboard_events SET name = ? WHERE ID = ?", $name, $id);
    }
    public function changeEventDate($id, $date) {
        $date = cleanup::cleanString($date);
        $this->db->query("UPDATE scoreboard_events SET date = ? WHERE ID = ?", $date, $id);
    }
    public function changeEventPerformance($eventid,$personid, $score, $place) {
        $score = cleanup::cleanString($score);
        $place = cleanup::cleanString($place);
        $this->db->query("UPDATE scoreboard_eventperformance SET score = ?, place = ? WHERE eventid = ? AND personid = ?", $score, $place, $eventid, $personid);
    }
    public function deleteEvent($eventid) {
        if (!$this->db->query("DELETE FROM scoreboard_events WHERE ID = ? ", $eventid)){return false;}
        if (!$this->db->query("DELETE FROM scoreboard_eventperformance WHERE eventid = ? ", $eventid)) {return false;}
        return true;
    }
}
