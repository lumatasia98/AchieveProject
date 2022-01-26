<?php


	$query = 'SELECT * FROM courses'; 
	$statement = $db->prepare($query);
	$statement->execute(); 
	$all_courses= $statement->fetchAll();
	$statement->closeCursor();
	#foreach($all_courses as $course){ echo $course['courseName']; }
?>