

<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
require_once __DIR__.'/../config/config.php';
require_once __DIR__.'/../classes/db.php';
require_once __DIR__.'/../classes/admin.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'])) {
    $dbhost = config::dbHost;
    $dbuser = config::dbUser;
    $dbpass = config::dbPassword;
    $dbname = config::dbName;

    $db = new db($dbhost, $dbuser, $dbpass, $dbname);
    $admin = new admin($db);
    $password = NULL;
    try {
        $password = $admin->getPass("scoreboard_admin");
    } catch (Exception $ex) {
        $password = NULL;
    }
    
    if ($password == NULL) {
        // create Scoreboard Admin Table
        $db->query("CREATE TABLE scoreboard_admins (ID int(11) NOT NULL AUTO_INCREMENT, username text NOT NULL, password text NOT NULL, PRIMARY KEY (ID)) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");
        // create Eventperformance Table
        $db->query("CREATE TABLE scoreboard_eventperformance ( ID int(11) NOT NULL AUTO_INCREMENT, eventid int(11) NOT NULL, personid int(11) NOT NULL, personname text NOT NULL, score int(11) NOT NULL, place text NOT NULL, PRIMARY KEY (ID)) ENGINE=InnoDB AUTO_INCREMENT=928 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");
        // create Events Table
        $db->query("CREATE TABLE scoreboard_events ( ID int(11) NOT NULL AUTO_INCREMENT, name text NOT NULL, date date NOT NULL, type text NOT NULL, PRIMARY KEY (ID)) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");
        // create Member Table
        $db->query("CREATE TABLE scoreboard_persons ( ID int(11) NOT NULL AUTO_INCREMENT, name text NOT NULL, PRIMARY KEY (ID)) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");
        
        //create Admin user
        $admin->createAdmin("scoreboard_admin", $_POST['password']);
        
        $db->close();
        
        // Redirect in 3 Seconds
        echo "<body><p>Redirecting</p><script>setTimeout(() => window.location.replace('https://".config::siteAddress."'), 3000);</script></body>";
        
        // delete setup.html 
        unlink(__DIR__."/../../../setup.html");     
        
        // delete self 
        unlink(__FILE__);
    }
    else {
        echo "There is already an Club Scoreboard database present!";
    }

}
