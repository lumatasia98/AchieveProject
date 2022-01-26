<?php
include "connect.php";
$_SESSION['gradebook']= array();

	$query = 'SELECT * FROM gradebook WHERE userID = :userID';
            $statement = $db ->prepare($query);
            $statement->bindValue(':userID',$_SESSION['userID']);
            $statement->execute();
            $user_has_courses = $statement->fetchAll();
            $statement->closeCursor();
            foreach($user_has_courses as $user_has_course){
                $query = 'SELECT * FROM gradebook WHERE assignID = :assignID';
                $statement = $db->prepare($query);
                $statement->bindValue(':assignID', $user_has_course['assignID']);
                $statement->execute();
                $course= $statement->fetch(PDO::FETCH_ASSOC);
                array_push($_SESSION['gradebook'], $course);
        }
        echo json_encode(array_values($_SESSION['gradebook']));

?>

