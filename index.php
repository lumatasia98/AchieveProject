

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign In</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

    <body>
        <div class="w-25 text-center container mt-5 p-3 mb-2 bg-secondary text-white">

        <title> Login</title>
        <h1> Submitty </h1>
        <br>
        <h2> Login</h2>
            <form style="max-width: 400px;margin: auto;" action="index.php" method="post">

                <br/>
                <input class="form-control" placeholder= "Username" required type="text" name="username">

                <input class="form-control" placeholder ="Password" type="password" required name="password">
                
                <button type="submit" id ="submitlogin" name="submitlogin" class="btn btn-primary btn-lg">Submit</button>

                
            </form>
            <form style="max-width: 400px;margin: auto;" action="signup.php" method="post">
            Don't Have an account? Sign up Here
            <br/> 
            <button type="submit" name="register" class="btn btn-lg btn-primary">Register</button>
                <br/>
			<?php
			if(isset($_SESSION['userID'])){
				session_destroy();
			}
			session_start();
			$dsn = 'mysql:host=localhost;dbname=achievedatabase'; 
			$username = 'super2'; 
			$password = 'duper2'; 

			try { 
			$db = new PDO($dsn, $username, $password); 
			} catch (PDOException $e) { 
			$error_message = $e->getMessage(); 
			echo "<p>An error occurred while connecting to 
						 the database: $error_message </p>"; 
			}

			 if(isset($_POST["submitlogin"])){
				$username= $_POST['username'];
				$password= $_POST['password'];

				
				$query = 'SELECT * FROM users 
					  WHERE username = :username AND password = :password'; 
				$statement = $db->prepare($query);
				$statement->bindValue(':username', $username);
				$statement->bindValue(':password', $password);
				$statement->execute(); 
				$user= $statement->fetch();
				$statement->closeCursor(); 
				if ($user){
					$_SESSION['userID'] = $user['userID'];
					$_SESSION['type'] = $user['userType'];		
					header('Location: submitty_home.php');
					exit();
				}        
				else {
					echo '<b>Invalid Login. Please try again</b>';
				}
				
			}
			if (isset($_GET['success'])){
				echo "<b>User creation successful! Please login!</b>";
			}
		 ?>
            </form>
		 			
        </div>
		
    </body>
</html>

