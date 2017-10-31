<?php
// define variables and set to empty values
$name = $email = $college = $id = $contact = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["user_name"]);
  $email = test_input($_POST["user_email"]);
  $address= test_input($_POST["user_address"]);
  $gender = test_input($_POST["user_gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo $name."<br>";
echo $email."<br>";
echo $address."<br>";
echo $gender."<br>";
?>

