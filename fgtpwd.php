<?php
// define variables and set to empty values
$email="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //$id = test_input($_POST["user_name"]);
  //$password = test_input($_POST["user_password"]);
  $email = test_input($_POST["email"]);
  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//echo $id."<br>";
echo $email."<br>";

$servername = "localhost";
$username = "root";
$pwd = "";
$dbname = "stupo";

// Create connection
$conn = new mysqli($servername, $username, $pwd, $dbname);
// Check connection
/*
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO login_db (id,password)
VALUES ('$id','$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

}
*/
$sql2 = "UPDATE railway_form SET roll_no='11' WHERE email='".$email."'";


if (mysqli_query($conn, $sql2)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

/*if (mysqli_query($conn, $sql3)) {
    echo "Record deleted successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}*/

?>

