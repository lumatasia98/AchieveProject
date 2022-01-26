<?php
include "connect.php"; 

		if (isset($_GET['assignmentID'])){
			$assignmentID=$_GET['assignmentID'];
		} else {
			$assignmentID=$_POST['assignmentID'];
		}
		$query = 'SELECT * FROM assignments
          WHERE assignmentID = :assignmentID'; 
		$statement = $db->prepare($query);
		$statement->bindValue(':assignmentID', $assignmentID);
		$statement->execute(); 
		$assignment= $statement->fetch();
		$statement->closeCursor(); 
		
		if(isset($_POST["submitAssignment"])){
				
				$uploadOK = 1;
				$targetDir = "uploads/";
				$targetFile = $targetDir . basename($_FILES['fileUpload']['name']);
				

				if(file_exists($targetFile)){
					$targetFile = $targetFile . "_1";
					if(file_exists($targetFile)){
						$uploadOK = 0;
					}
				}
				
				if ($uploadOK == 0){
					$success= false;
					$uploadError = "File failed to upload";
				}
				else{
					if(move_uploaded_file($_FILES['fileUpload']['tmp_name'],$targetFile)){
						$fileAddress= $targetFile;
						$submitDate=date('Y-m-d');
						#echo $submitDate;
						$courseID=$assignment['courseID'];
						
						$query = "INSERT INTO submissions
						(assignmentID,studentID,courseID, submitDate,fileAddress) 
						VALUES 
						(:assignmentID, :studentID, :courseID, :submitDate, :fileAddress)"; 
	 
						$statement = $db->prepare($query); 
						$statement->bindValue(':assignmentID', $assignmentID); 
						$statement->bindValue(':studentID', $_SESSION['userID']); 
						$statement->bindValue(':courseID', $courseID);  
						$statement->bindValue(':submitDate', $submitDate); 
						$statement->bindValue(':fileAddress', $fileAddress);	
						$statement->execute(); 
						$statement->closeCursor(); 
						$success= true;
					}
					else{
						$success= false;
						$uploadError = "File Failed to move properly in temp location";
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
				  <p>Submit Assignment</p>
				  <hr>
				</header>
				<form action="submit_assignment.php" method="post" enctype="multipart/form-data">
				  
				  <div class="form-group row text-left">
					<label for="fileUpload" class="col-sm-2 col-form-label"> File Upload: </label>
					<div class="col-md-4 mb-3">
						<input type="file" class="form-control" id="fileUpload" name="fileUpload">
					</div>
				  </div>
				  <input type= "hidden" id="assignmentID" name="assignmentID" value=<?php echo $assignmentID ?>></input>
				  <div class="form-group row text-right">
					<div class="col-sm-10">
					  <button type="submit" id="submitAssignment" name="submitAssignment" class="btn btn-primary">Submit Assignment</button>
					</div>
				  </div>
				</form>
				<?php
					if (isset($success)){
						if ($success){
							echo "Assignment Submitted Successfully!";
						} else {
							echo "Upload Failed, please try again : " . $uploadError;
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