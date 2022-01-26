<?php

   include "connect.php";
?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>
<body>
    <div class=" w-25 text-center container mt-5 p-3 mb-2 bg-secondary text-white">
        <h2> Sign up </h2>
        <form style="max-width: 400px;margin: auto;" action="signup.php" method="post" id="form">

            First Name
            <br/>
            <input class="form-control" type="text" placeholder= "First Name" name="fname" maxlength="10" required>
            <br/>

            Last Name
            <br/>
            <input class="form-control" type="text" placeholder= "Last Name" name="lname" maxlength="10" required>
            <br/>     

            Choose a Username
            <br/>
            <input class="form-control" type="text" placeholder= "Username" name="username" maxlength="10" required>
            <br/>

            Choose a Password
            <br/>
            <input class="form-control" type="password" name="pwd" maxlength="10" placeholder="Password" required>
            <br/>

            Confirm Password
            <br/>
            <input class="form-control" type="password" name="confirmpwd" maxlength="10" placeholder=" Confirm Password" required>
            <br/>

            Enrolled Courses
            <br>
			<?php
			include 'all_courses.php';
			foreach($all_courses as $course){
				$coursename=$course['courseName'];
				$courseID = $course['courseID'];
				echo "<input class='checkbox-inline' type='checkbox' id=".$coursename." name=".$coursename." value=".$courseID.">";
				echo "<label for=".$coursename.">".$coursename."</label>";
			}
           ?>
            <br>

            <label for="studentorinstructor">Choose Role</label>
            <select class="form-control" id="studentorinstructor" required name="studentorinstructor">
                <option>Student</option>
                <option>Instructor</option>
            </select>

            <button onclick="validateForm()" class="btn btn-primary btn-lg" type="submit" name="submit"> Sign up </button>
            <div>

                <?php   


                if(isset($_POST["submit"])){
                    $fname= $_POST['fname'];
                    $lname= $_POST['lname'];
                    $username= $_POST['username'];
                    $password= $_POST['pwd'];
                    $confirmpwd=$_POST['confirmpwd'];
                    $userType=$_POST['studentorinstructor'];
					$enrolledCourses= array();
					foreach($all_courses as $enrolled){
						if (isset($_POST[$enrolled['courseName']])){
							array_push($enrolledCourses,$enrolled['courseID']);
						}
					}
                   

                    if ($password != $confirmpwd) {
                        echo "<p> Passwords do not match<p>";
                    }
                    else{
					

                    $query = "INSERT INTO users (fName,lName,userType,username,password) VALUES (?,?,?,?,?)";
                    $statement = $db->prepare($query);
                    $result=$statement->execute([$fname,$lname,$userType,$username,$password]);
                    $statement->closeCursor();

					$query = 'SELECT * FROM users 
					  WHERE userName = :userName'; 
					$statement = $db->prepare($query);
					$statement->bindValue(':userName', $username);
					$statement->execute(); 
					$user= $statement->fetch();
					$statement->closeCursor(); 
					foreach ($enrolledCourses as $value){
						$query = "INSERT INTO users_has_courses
								(courseID,userID) 
								VALUES 
								(:courseID, :userID)"; 
	 
						$statement = $db->prepare($query); 
						$statement->bindValue(':courseID', $value); 
						$statement->bindValue(':userID', $user['userID']); 		
						$statement->execute(); 
						$statement->closeCursor(); 
					}
                    if($result) 
                    {
						header('Location: index.php?success=true');
						

                    }
                    else{
                        echo "error";
                    }


                }
            }
				?>
                                
            </div>

        </form>


    </body>
    </html>
