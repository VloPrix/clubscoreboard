<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of cleanup
 *
 * @author lha
 */
class cleanup {
    public static function cleanString($string) {
        $string = strip_tags($string);
        $string = htmlspecialchars($string);
        return $string;
    }
}
