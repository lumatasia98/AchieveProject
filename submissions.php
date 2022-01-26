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
				  <p>Student Submissions</p>
				  <hr>
				</header>
			
				<?php
					if(isset($_POST["submitGrade"])){
									$grade= $_POST['grade'];
									$assignmentID= $_POST['assignmentID'];
									$studentID= $_POST['studentID'];
									
									$query = 'SELECT * FROM submissions 
									WHERE assignmentID = :assignmentID'; 
									$statement = $db->prepare($query);
									$statement->bindValue(':assignmentID',$assignmentID);
									$statement->execute(); 
									$assignment= $statement->fetch();
									$statement->closeCursor(); 
									
									$query = 'UPDATE submissions
										SET points= :points
										WHERE assignmentID = :assignmentID AND studentID = :studentID'; 
										$statement = $db->prepare($query);
										$statement->bindValue(':assignmentID',$assignmentID);
										$statement->bindValue(':studentID',$studentID);
										$statement->bindValue(':points',$grade);
										$statement->execute(); 
										$statement->closeCursor();
									
									
									$score= $grade;
									
									$query = 'UPDATE gradebook
										SET grade= :grade
										WHERE assignID = :assignID AND userID = :userID'; 
									$statement = $db->prepare($query);
									$statement->bindValue(':assignID',$assignmentID);
									$statement->bindValue(':userID',$studentID);
									$statement->bindValue(':grade',$score);
									$statement->execute(); 
									$statement->closeCursor();
									
					}
					foreach($_SESSION['courses'] as $course){
							
							$query = 'SELECT * FROM submissions 
							WHERE courseID = :courseID'; 
							$statement = $db->prepare($query);
							$statement->bindValue(':courseID',$course['courseID']);
							$statement->execute(); 
							$submissions= $statement->fetchAll();
							$statement->closeCursor(); 
							
							foreach($submissions as $submission){
								$query = 'SELECT * FROM users
								WHERE userID = :userID'; 
								$statement = $db->prepare($query);
								$statement->bindValue(':userID',$submission['studentID']);
								$statement->execute(); 
								$student= $statement->fetch();
								$statement->closeCursor();
								
								$query = 'SELECT * FROM assignments
								WHERE assignmentID = :assignmentID'; 
								$statement = $db->prepare($query);
								$statement->bindValue(':assignmentID',$submission['assignmentID']);
								$statement->execute(); 
								$assignment= $statement->fetch();
								$statement->closeCursor();
								
								echo "<ul class='list-unstyled'>";
									echo "<li><b>".$student['fName']." ".$student['lName']."</b></li>";
									echo "<li><b>Assignment: </b>".$assignment['assignmentName']."</li>";
									$fileName = basename($submission['fileAddress']);
									echo "<li><b>File: </b><a href='".$submission['fileAddress']."' download>".$fileName."</a></li>";
									echo "<li><b>Submitted on: </b>".$submission['submitDate']." </li>";
									echo "<li><b>Current Grade: </b>".$submission['points']."</li>";
									
								echo "</ul>";
								
								echo "<form action='submissions.php' method='post'>";
									echo "<div class='form-group row text-right'>";
										echo "<label for='grade' class='col-sm-2 col-form-label'>Grade: </label>";
										echo "<div class='col-md-4 mb-3'>";
										echo "<input type='number'  placeholder=' /".$assignment['pointValue']."' class='form-control' id='grade' name='grade'>";
									echo "</div>";
									echo "<input type= 'hidden' id='studentID' name='studentID' value=".$student['userID']."></input>";
									echo "<input type= 'hidden' id='assignmentID' name='assignmentID' value=".$assignment['assignmentID']."></input>";
									echo "<div class='form-group row text-right'>";
										echo "<input type='submit' class='form-control' id='submitGrade' value='Submit Grade Change' name='submitGrade'>";
									echo "</div>";
								echo "</div>";
								echo "</form>";
								echo "<hr>";
								

														
							}			
					}
					
					
				?>
				
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