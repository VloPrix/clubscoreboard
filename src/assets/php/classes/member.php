<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of member
 *
 * @author lha
 */
class member {
    function __construct($db) {
        $this->db = $db;
    }
    public function getMembers() {
        $persons = $this->db->query('SELECT * FROM scoreboard_persons')->fetchAll();
        return $persons;
    }
    public function newMember($name) {
        $name = cleanup::cleanString($name);
        $event = new event($this->db);
        
        $this->db->query("INSERT INTO scoreboard_persons (name) VALUES (?)", $name);

        $personid = $this->db->lastInsertID();

        $all_events = $event->getAllEvents();

        foreach ($all_events as $single_event) {
            $this->db->query("INSERT INTO scoreboard_eventperformance (eventid,personid,score,place) VALUES (?,?,?,?)", $single_event['ID'], $personid, 0, "");
        }
    }
    public function getName($personid) {
        $person = $this->db->query('SELECT name FROM scoreboard_persons WHERE ID = ?', $personid)->fetchArray();
        return $person['name'];
    }
    public function getAllScores($personid) {
        $scores = $this->db->query('SELECT score FROM scoreboard_eventperformance WHERE personid = ?', $personid)->fetchAll();
        return $scores;
    }
    public function deleteMember($memberid) {
        if (!$this->db->query("DELETE FROM scoreboard_persons WHERE ID = ? ", $memberid)) {return false;}
        if (!$this->db->query("DELETE FROM scoreboard_eventperformance WHERE personid = ? ", $memberid)) {return false;}
        return true;
    }
}
