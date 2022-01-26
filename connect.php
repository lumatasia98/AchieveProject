<?php
$dsn = 'mysql:host=localhost;dbname=achievedatabase'; 
include "credential.php";
 
	try { 
    $db = new PDO($dsn, $username, $password); 
	} catch (PDOException $e) { 
    $error_message = $e->getMessage(); 
    echo "<p>An error occurred while connecting to 
             the database: $error_message </p>"; 
	}
	session_start();
	$query = 'SELECT * FROM users 
          WHERE userID = :userID'; 
		$statement = $db->prepare($query);
		$statement->bindValue(':userID', $_SESSION['userID']);
		$statement->execute(); 
		$user= $statement->fetch();
		$statement->closeCursor(); 
		

	
?>