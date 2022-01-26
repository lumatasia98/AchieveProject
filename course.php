<?php
include "connect.php";
		

	
?>
<!DOCTYPE html>

<html>
    <head>
		<link rel="stylesheet" href="mystyle.css"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Submitty</title>
        <meta charset="utf-8">
    </head>
    <body>
        
		<div class="container-fluid">
		  <div class="row">
			<?php
			$coursename=$_GET['coursename'];
			
			if ($user['userType']=="Instructor"){
				include 'instructor_nav.php';
			}
			if ($user['userType']=="Student"){
				include 'student_nav.php';
			}
			?>
			<div class="col">
				<header class="bg-primary rounded-bottom shadow text-center">
				  <h1>Submitty</h1>
				  <p>Course Details</p>
				  <hr>
				</header>
				<div class="container">
				  <div class="row">
					<div class="col">
					  <?php
					$query = 'SELECT * FROM courses 
					WHERE courseName = :courseName'; 
					$statement = $db->prepare($query);
					$statement->bindValue(':courseName',$coursename);
					$statement->execute(); 
					$course= $statement->fetch();
					$statement->closeCursor(); 
					
					$query = 'SELECT * FROM assignments 
					WHERE courseID = :courseID ORDER BY `dueDate` ASC'; 
					$statement = $db->prepare($query);
					$statement->bindValue(':courseID',$course['courseID']);
					$statement->execute(); 
					$assignments= $statement->fetchAll();
					$statement->closeCursor(); 
					
					echo "<ul class='list-unstyled'>";
						echo "<li><h3>$coursename</h3></li>";
					    echo "<li><b>Department: </b> ".$course['department']."</li>";
						$query = 'SELECT * FROM users 
						  WHERE userID = :userID'; 
						$statement = $db->prepare($query);
						$statement->bindValue(':userID', $course['instructor']);
						$statement->execute(); 
						$instructor= $statement->fetch();
						$statement->closeCursor(); 
						echo "<li><b>Instructor:</b> ".$instructor['fName']." ".$instructor['lName']." </li>";
						echo "<li><b>Room #:</b> ".$course['roomNumber']. "</li>";
						echo "<li><b>Meeting Times:</b> ".$course['meetingTimes']. "</li>";
						echo "<hr>";
						echo "<li><b>Course description: </b>".$course['description']."</li>";  
						echo "<li><b>Required textbook: </b>".$course['books']."</li>";
					echo "</ul>";

				?>
					</div>
					<div class="col">
						<ul class='list-unstyled'>
					  <?php
						if ($user['userType']=="Student"){
							echo "<li><b>Grade: <a href='gradebook.php?coursename=$coursename'></a></b></li>";
							echo "<hr>";
						echo "<b>Course Assignments</b>";
						}
						foreach($assignments as $assignment){
								echo "<ul class='list-unstyled'>";
									echo "<li><b>Assignment:</b><a href='view_assignment.php?assignmentID=".$assignment['assignmentID']."'> ".$assignment['assignmentName']."</a></li>";
									echo "<li><b>Due on: </b>".$assignment['dueDate']." </li>";
									echo "<hr>";
								echo "</ul>";
						}
						$courseID=$course['courseID'];
						if ($user['userType']=="Instructor"){
							echo "<a href='post_assignment.php?courseID=$courseID'><button type='button' class='btn btn-primary'>Post Assignment</button></a>";
						}
							
					 ?>
					  
					</div>
				  </div>
				</div>  
				
			 
			</div>
			
		  </div>
		</div>
	</body>
	<footer>
		<hr>
		<h6><i>&copy A Team Achieve Application</i></h6>
		<p> Authors: Samantha Schiff, Kevin Solorzano-Hernandez, and Nathon Dixon </p>
	</footer>
</html>