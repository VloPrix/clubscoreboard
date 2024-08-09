<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of sort
 *
 * @author lukeh
 */
class misc {
    public static function sortTotalscoreDesc($array) {
        foreach ($array as $key => $row) {
                //$id[$key]  = $row['ID'];
                $name[$key] = $row['name'];
		$totalscore[$key] = $row['totalscore'];
            }

            //$id  = array_column($array, 'ID');
            $name = array_column($array, 'name');
            $totalscore = array_column($array, 'totalscore');

            // Sort the data with volume descending, edition ascending
            // Add $data as the last parameter, to sort by the common key
            array_multisort($totalscore, SORT_DESC, $array);
            return $array;
    }
    public static function HTMLDateToSQL($date) {
        return date("Y-m-d",strtotime($date));
    }
}
