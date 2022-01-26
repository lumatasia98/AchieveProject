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
				  <p>Assignments</p>
				  <hr>
				</header>
			
			<div class="container-fluid">
			<div class="row">
				<?php
						foreach($_SESSION['courses'] as $course){
								
								$query = 'SELECT * FROM courses 
								WHERE courseName = :courseName'; 
								$statement = $db->prepare($query);
								$statement->bindValue(':courseName',$course['courseName']);
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
								echo "<div class='col border-right'>";
								echo "<p class= 'text-center'><b>".$course['courseName']."</b></p>";
								foreach($assignments as $assignment){
									echo "<ul class='list-unstyled'>";
										echo "<li><b>Assignment:</b><a href='view_assignment.php?assignmentID=".$assignment['assignmentID']."'> ".$assignment['assignmentName']."</a></li>";
										echo "<li><b>Due on: </b>".$assignment['dueDate']." </li>";
										echo "<hr>";
									echo "</ul>";
									
								}
								echo "</div>";
							
						}
						
				?>
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