<?php
include "connect.php";
	$assignmentID=$_GET['assignmentID'];
	 
		
		$query = 'SELECT * FROM assignments 
					WHERE assignmentID = :assignmentID'; 
		$statement = $db->prepare($query);
		$statement->bindValue(':assignmentID',$assignmentID);
		$statement->execute(); 
		$assignment= $statement->fetch();
		$statement->closeCursor(); 
		

	
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
				  <p>Assignment Details</p>
				  <hr>
				</header>
				<div class="container">
				  <div class="row">
					<div class="col">
			<?php
					$fileName = basename($assignment['fileAddress']);
					echo "<ul class='list-unstyled'>";
					echo "<li><h3>".$assignment['assignmentName']."</h3></li>";
				    echo "<li><b>Due Date: </b> ".$assignment['dueDate']."</li>";
				    echo "<hr>";
					echo "<li><b>Description:</b> ".$assignment['description']. "</li>";
					echo "<li><a href='".$assignment['fileAddress']."' download>".$fileName."</a></li>";
					echo "<hr>";
					echo "</ul>";

					echo "</div>";
					echo "<div class='col text-right'>";
					echo "<ul class='list-unstyled'>";
						
					if ($user['userType']=="Student"){
						echo "<a href='submit_assignment.php?assignmentID=$assignmentID'><button type='button' class='btn btn-primary'>Submit Assignment</button></a>";
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