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
				  <p>Gradebook</p>
				  <hr>
				</header>
				<?php
					if ($user['userType']=="Instructor"){
						include 'instructorGrade.php';
					}
					else{
						include 'studentGrade.php';
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