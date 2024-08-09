<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of session
 *
 * @author lha
 */
class session {
    public static function startSession() {
        session_start();
    }
    public static function setSessionVar($var, $val) {
        $_SESSION[$var] = $val;
    }
    public static function getSessionVar($var) {
        if (!isset($_SESSION[$var])) {
            $_SESSION[$var] = null;
        }
        return $_SESSION[$var];
    }
    public static function destroySession() {
        session_destroy();
    } 
}
