<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of request
 *
 * @author lha
 */
class request {
    public static function getPost($value) {
        if (!isset($_POST[$value])) {
            return null;
        }
        if ("" == $_POST[$value]) {
            return null;
        }
        return $_POST[$value];
    }
    public static function getGet($value) {
        if (!isset($_GET[$value])) {
            return null;
        }
        if ("" == $_GET[$value]) {
            return null;
        }
        return cleanup::cleanString($_GET[$value]);
    }
}
