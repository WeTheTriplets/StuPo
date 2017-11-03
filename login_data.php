
<?php
session_start();
include "connect.php";
// define variables and set to empty values
$id = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = test_input($_POST["user_name"]);
  $password = test_input($_POST["user_password"]);
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo $id."<br>";



$sql1 = " SELECT * FROM registered_details where st_id='$id' ";

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    $sql2 = "SELECT * from registered_details where st_id='$id' and st_password='$password'" ;
    $result2 =$conn->query($sql2) ;
      if($result2->num_rows > 0)
      {
      	echo "You are logged in successfully";
        header('Location:loading.html');
      } 
      else 
      {
        echo "password is incorrect for id= ". $id ;
      }

} else {
    echo "Error: " ."Given student_id does not exists " ."<br>";
}

?>

