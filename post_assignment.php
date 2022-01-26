<?php
include "connect.php"; 

		if (isset($_GET['courseID'])){
			$courseID=$_GET['courseID'];
		} else {
			$courseID=$_POST['courseID'];
		}
		
		if(isset($_POST["postAssignment"])){
				$assignmentName= $_POST['assignmentName'];
				$description= $_POST['assignmentDescription'];
				$pointValue= $_POST['pointValue'];
				$assignmentType= $_POST['assignmentType'];
				$dueDate=$_POST['dueDate'];
				
				$uploadOK = 1;
				$targetDir = "uploads/";
				$targetFile = $targetDir . basename($_FILES['fileUpload']['name']);
				$targetFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
				

				if(file_exists($targetFile)){
					$targetFile = $targetFile . "_1";
					if(file_exists($targetFile)){
						$uploadOK = 0;
					}
				}
				
				if ($uploadOK == 0){
					$success= false;
				}
				else{
					if(move_uploaded_file($_FILES['fileUpload']['tmp_name'],$targetFile)){
						$fileAddress= $targetFile;
						
						$query = "INSERT INTO assignments
						(courseID,assignmentName, description, pointValue,assignmentType, dueDate, fileAddress) 
						VALUES 
						(:courseID, :assignmentName, :description, :pointValue,:assignmentType, :dueDate, :fileAddress)"; 
	 
						$statement = $db->prepare($query); 
						$statement->bindValue(':courseID', $courseID); 
						$statement->bindValue(':assignmentName', $assignmentName); 
						$statement->bindValue(':description', $description); 
						$statement->bindValue(':pointValue', $pointValue); 
						$statement->bindValue(':assignmentType', $assignmentType); 
						$statement->bindValue(':dueDate', $dueDate); 
						$statement->bindValue(':fileAddress', $fileAddress);			
						$statement->execute(); 
						$statement->closeCursor(); 
						$success= true;
					}
					else{
						$success= false;
					}
				
				}
				
			
		} 
	
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
			<div class="col" align="center">
				<header class="bg-primary rounded-bottom shadow text-center">
				  <h1>Submitty</h1>
				  <p>Post Assignment</p>
				  <hr>
				</header>
				<form action="post_assignment.php" method="post" enctype="multipart/form-data">
				  <div class="form-group row text-left">
					<label for="assignmentName" required class="col-sm-2 col-form-label">Assignment Name: </label>
					<div class="col-md-4 mb-3">
					  <input type="text" class="form-control" id="assignmentName" name="assignmentName">
					</div>
				  </div>
				  <div class="form-group">
					<label for="assignmentDescription">Description: </label>
					<textarea class="form-control col-md-7 mb-4" id="assignmentDescription" name="assignmentDescription" rows="5"></textarea>
				  </div>
				  <div class="form-group row text-left">
					<label for="pointValue"required class="col-sm-2 col-form-label">Point Value: </label>
					<div class="col-md-4 mb-3">
					  <input type="number" class="form-control" id="pointValue" min="0" max="100" name="pointValue">
					</div>
				  </div>
				  <div class="form-group row text-left">
					<label for="assignmentType" required class="col-sm-2 control-label"> Assignment Type: </label>
					<div class="col-md-4 mb-3">
						<select class="form-control" name="assignmentType" id="assignmentType">
							<option value="homework">Homework</option>
							<option value="exam">Exam</option>
							<option value="quiz">Quiz</option>
							<option value="classwork">Classwork</option>
						</select>
					</div>
				  </div>
				  <div class="form-group row text-left">
					<label for="fileUpload" class="col-sm-2 col-form-label"> File Upload: </label>
					<div class="col-md-4 mb-3">
						<input type="file" class="form-control" id="fileUpload" name="fileUpload">
					</div>
				  </div>
				  <div class="form-group row text-left">
					<label for="dueDate" required class="col-sm-2 col-form-label"> Due Date: </label>
					<div class="col-md-4 mb-3">
						<input type="date" class="form-control" id="dueDate" name="dueDate">
					</div>
				  </div>
				  <input type= "hidden" id="courseID" name="courseID" value=<?php echo $courseID ?>></input>
				  <div class="form-group row text-right">
					<div class="col-sm-10">
					  <button type="submit" id="postAssignment" name="postAssignment" class="btn btn-primary">Post Assignment</button>
					</div>
				  </div>
				</form>
				<?php
					if (isset($success)){
						if ($success){
							echo "Assignment Posted Successfully!";
						} else {
							echo "Upload Failed, please try again";
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