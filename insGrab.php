<?php
include "connect.php";


$sql = "SELECT * FROM gradebook";


$result = $db->query($sql);
$arrVal = array();

if ($result->rowcount() > 0){
  while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $name = array(
      'courseName' => $row["courseName"],
      'assignID' => $row["assignID"],
      'assignName' => $row["assignName"],
      'userID' => $row["userID"] ,
      'userName' => $row["userName"] ,
      'assignType' => $row["assignType"] ,
      'grade' => $row["grade"] ,
    );
    array_push($arrVal, $name);
  }
}

echo json_encode($arrVal);
$db = null;
 ?>
