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
				  <p>Welcome <?php echo $user['fName']." ".$user['lName'];?></p>
				  <hr>
				</header>
				<?php
				include 'has_courses.php';
						foreach($_SESSION['courses'] as $course){
								echo "<ul class='list-unstyled'>";
									echo "<li><b>Course:</b><a href='course.php?coursename=".$course['courseName']."'> ".$course['courseName']."</a></li>";
									if ($user['userType']=='Student'){
										$query = 'SELECT * FROM users 
										  WHERE userID = :userID'; 
										$statement = $db->prepare($query);
										$statement->bindValue(':userID', $course['instructor']);
										$statement->execute(); 
										$instructor= $statement->fetch();
										$statement->closeCursor(); 
										echo "<li><b>Instructor:</b> ".$instructor['fName']." ".$instructor['lName']." </li>";
									
									}
									echo "<li><b>Room #:</b> ".$course['roomNumber']. "</li>";
									echo "<li class='text-right'><b>Meeting Times:</b> ".$course['meetingTimes']. "</li>";
									echo "<hr>";
								echo "</ul>";
							
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