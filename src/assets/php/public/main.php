<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once __DIR__.'/../config/config.php';
require_once __DIR__.'/../classes/admin.php';
require_once __DIR__.'/../classes/cleanup.php';
require_once __DIR__.'/../classes/db.php';
require_once __DIR__.'/../classes/event.php';
require_once __DIR__.'/../classes/member.php';
require_once __DIR__.'/../classes/verify.php';
require_once __DIR__.'/../classes/json.php';
require_once __DIR__.'/../classes/misc.php';
require_once __DIR__.'/../classes/session.php';
require_once __DIR__.'/../classes/request.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    session::startSession();    

    $db = new db(config::dbHost, config::dbUser, config::dbPassword, config::dbName);
    
    $requestType = request::getPost("type");
    $username = request::getPost('username');
    $password = request::getPost('password');
    $eventid = request::getPost('eventid');
    $eventname = request::getPost('eventname');
    $eventdate = request::getPost('eventdate');

    switch ($requestType) {
        case "login":
            $admin = new admin($db);

            $loginSuccess = $admin->validateLogin($username, $password);
            if ($loginSuccess) {
                $jsonArray = [
                "status" => "success",
                ];
                json::outputJsonReturn($jsonArray);
            
                session::setSessionVar("loggedIn", true);
            }
            else {
                $jsonArray = [
                "status" => "loginFailed",
                ];
                json::outputJsonReturn($jsonArray);
            }
            break;
        case "getAllEvents":
            $events = new event($db);
            $allevents = $events->getAllEvents();
            
            if (!$allevents) {
                json::outputJsonReturn(["status" => "error"]);
                break;
            }
            
            $array = array();

            foreach ($allevents as $singleevent) {
		$array[] = array(
			"ID" => cleanup::cleanString($singleevent['ID']),
			"name" => cleanup::cleanString($singleevent['name']),
			"date" => cleanup::cleanString($singleevent['date'])
		);

            }
            json::outputJsonReturn($array);
            break;
        case "getAllMember":
            $member = new member($db);
            $allMember = $member->getMembers();
            
            if (!$allMember) {
                json::outputJsonReturn(["status" => "error"]);
                break;
            }
            
            $array = array();

            foreach ($allMember as $singleMember) {
		$array[] = array(
			"ID" => cleanup::cleanString($singleMember['ID']),
			"name" => cleanup::cleanString($singleMember['name'])
		);

            }
            json::outputJsonReturn($array);
            break;
        case "getTotalPerformance":
            $events = new event($db);
            $member = new member($db);
            
            $array = array();
            
            $allMembers = $member->getMembers();
            
            if (!$allMembers) {
                json::outputJsonReturn(["status" => "error"]);
                break;
            }

            foreach ($allMembers as $singleMember) {
		$memberTotalScore = 0;
		$scores = $member->getAllScores($singleMember['ID']);
		foreach ($scores as $score) {
			$memberTotalScore = $memberTotalScore + $score['score'];
		}

		$array[] = array(
			// "ID" => $person['ID'],
			"name" => cleanup::cleanString($singleMember['name']),
			"totalscore" => cleanup::cleanString($memberTotalScore)
		);

            }
            
            $array = misc::sortTotalscoreDesc($array);
            
            json::outputJsonReturn($array);
            break;
        case "getEventStats":
            $events = new event($db);
            $members = new member($db);
            $allPerformance = $events->getEventPerformance($eventid);
            $array = array();
            
            if (!$allPerformance) {
                json::outputJsonReturn(["status" => "error"]);
                break;
            }
            
            foreach ($allPerformance as $performance) {
                $memberName = $members->getName($performance['personid']);
                
                if (!$memberName) {
                    json::outputJsonReturn(["status" => "error"]);
                    break;
                }
                
                $array[] = array(
                    "personid" => cleanup::cleanString($performance['personid']),
		    "personname" => cleanup::cleanString($memberName),
		    "score" => cleanup::cleanString($performance['score']), 
                    "place" => cleanup::cleanString($performance['place'])
                );

            }
            json::outputJsonReturn($array);
            break;
            case "getEventInfo":
                
                if (null == $eventid) {
                    json::outputJsonReturn(["status" => "error"]);
                    break;
                }
                
                $events = new event($db);
                $array = array();
                
                $eventInfo = $events->getEvent($eventid);
                
                if (!$eventInfo) {
                    json::outputJsonReturn(["status" => "error"]);
                    break;
                }
                
                json::outputJsonReturn([
                    "name" => cleanup::cleanString($eventInfo['name']),
		    "date" => cleanup::cleanString($eventInfo['date'])
                ]);
                break;
        case "session";
            $jsonArray = [
                "loggedIn" => session::getSessionVar("loggedIn"),
            ];
            json::outputJsonReturn($jsonArray);
            break;
        case "logOut";
            session::setSessionVar("loggedIn", false);
            session::destroySession();
            break;
        case "createEvent";
            if (!session::getSessionVar("loggedIn")) {
                json::outputJsonReturn(["status" => "notLoggedIn"]);
                break;
            }
            if (null == $eventname || null == $eventdate) {
                json::outputJsonReturn(["status" => "error"]);
                break;
            }
            $event = new event($db);
            $member = new member($db);
            $eventid = $event->newEvent($eventname, misc::HTMLDateToSQL($eventdate));
            
            if (!$eventid) {
                json::outputJsonReturn(["status" => "error"]);
                break;
            }
            
            $allMembers = $member->getMembers();
            foreach ($allMembers as $singleMember) {
                $memberScore = request::getPost($singleMember['ID']);
                if (verify::isInt($memberScore) && null !== request::getPost($singleMember['ID']."placement")) {
                    $event->insertEventPerformance($eventid, $singleMember['ID'], $memberScore, request::getPost($singleMember['ID']."placement"));
                }
                else if (verify::isInt($memberScore)) {
                    $event->insertEventPerformance($eventid, $singleMember['ID'], $memberScore, "");
                }
                else {
                    $event->insertEventPerformance($eventid, $singleMember['ID'], 0, "");
                }
            }
            json::outputJsonReturn(["status" => "success"]);
            break;
        case "editEvent":
            if (!session::getSessionVar("loggedIn")) {
                json::outputJsonReturn(["status" => "notLoggedIn"]);
                break;
            }
            if (null == $eventid) {
                json::outputJsonReturn(["status" => "error"]);
                break;
            }
            $event = new event($db);
            $member = new member($db);

            if (null !== $eventname) {
                $event->changeEventName($eventid, $eventname);
            }
            if (null !== $eventdate) {
                $event->changeEventDate($eventid, $eventdate);
            }
            
            $allMembers = $member->getMembers();
            foreach ($allMembers as $singleMember) {
                if (null !== request::getPost($singleMember['ID']) && verify::isInt($singleMember['ID']) && null !== request::getPost($singleMember['ID']."placement")) {
                    $event->changeEventPerformance($eventid,$singleMember['ID'], request::getPost($singleMember['ID']), request::getPost($singleMember['ID']."placement"));
                }
                else if (null !== request::getPost($singleMember['ID']) && verify::isInt($singleMember['ID'])){
                    $event->changeEventPerformance($eventid,$singleMember['ID'], request::getPost($singleMember['ID']), "");
                }
                else {
                    $event->changeEventPerformance($eventid, $singleMember['ID'], 0, "");
                }
            }
            json::outputJsonReturn(["status" => "success"]);
            break;
        case "createMember": 
            if (!session::getSessionVar("loggedIn")) {
                json::outputJsonReturn(["status" => "notLoggedIn"]);
                break;
            }
        case "deleteEvent":
            if (!session::getSessionVar("loggedIn")) {
                json::outputJsonReturn(["status" => "notLoggedIn"]);
                break;
            }
            if (null == request::getPost("name")) {
                json::outputJsonReturn(["status" => "error"]);
                break;
            }
            $member = new member($db);
            
            $member->newMember(request::getPost("name"));
            
            json::outputJsonReturn(["status" => "success"]);
            
            break;
        case "deleteMember":
            if (!session::getSessionVar("loggedIn")) {
                json::outputJsonReturn(["status" => "notLoggedIn"]);
                break;
            }
            if (null == request::getPost("memberid")) {
                json::outputJsonReturn(["status" => "error"]);
                break;
            }
            $member = new member($db);
            if (!$member->deleteMember(request::getPost("memberid"))) {
                json::outputJsonReturn(["status" => "error"]);
                break;
            }
            
            json::outputJsonReturn(["status" => "success"]);
            
            break;
        default:
            json::outputJsonReturn(["status" => "invalidoption"]);
    }
    $db->close();
}

