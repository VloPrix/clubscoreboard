<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of admin
 *
 * @author lha
 */
class admin {
    function __construct($db) {
        $this->db = $db;
    }
    public function createAdmin($username, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $this->db->query("INSERT INTO scoreboard_admins (username, password) VALUES (?,?)",$username, $password);
    }
    public function validateLogin($username, $password) {
        $db_passwd = $this->getPass($username);
        if ($db_passwd != NULL) {
            if (password_verify($password,$db_passwd)) {
                return true;
            }
        }
        return false;
    }
    function getPass($username) {
        $result = $this->db->query("SELECT password FROM scoreboard_admins WHERE username = ?", $username)->fetchArray();
        if (isset($result['password'])) {
            return $result['password'];
        }
        return NULL;
    }
}
