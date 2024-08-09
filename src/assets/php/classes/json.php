<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of json
 *
 * @author lukeh
 */
class json {
    public static function outputJsonReturn($jsonArray) {
        header('Content-Type: application/json');
        echo json_encode($jsonArray);
    }
}
