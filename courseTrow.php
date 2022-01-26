<?php
include "connect.php";
$_SESSION['courses']= array();

	$query = 'SELECT * FROM users_has_courses WHERE userID = :userID';
		$statement = $db ->prepare($query);
		$statement->bindValue(':userID',$_SESSION['userID']);
		$statement->execute();
		$user_has_courses = $statement->fetchAll();
		$statement->closeCursor();
		foreach($user_has_courses as $user_has_course){
			$query = 'SELECT * FROM courses WHERE courseID = :courseID';
			$statement = $db->prepare($query);
			$statement->bindValue(':courseID', $user_has_course['courseID']);
			$statement->execute();
			$course= $statement->fetch(PDO::FETCH_ASSOC);
			array_push($_SESSION['courses'], $course);
	}
	echo json_encode(array_values($_SESSION['courses']));

?>
