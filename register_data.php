<?php
session_start();
include "connect.php";
// define variables and set to empty values
$name = $email = $college = $id = $contact = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $id = test_input($_POST["id"]);
  $email = test_input($_POST["email"]);
  $college = " k.J somaiya College of Engineering";
  $password=test_input($_POST["pwd"]);
  $contact = test_input($_POST["contact"]);
  $gender=test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

echo "registered successfully";
echo $name."<br>";
echo $email."<br>";
echo $college."<br>";
echo $id."<br>";
echo $contact."<br>";
echo $gender ."<br>";



$sql1 = "SELECT * FROM student where student_id='$id' " ;
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    $sql2 = "SELECT * from student where student_id='$id' and student_password='$password'" ;
    $result2 =$conn->query($sql2) ;
      if($result2->num_rows > 0)
      {
        $sql3 = "SELECT student_name ,student_mail  FROM student where student_id='$id'";
        $result3 = $conn->query($sql3);

        if ($result3->num_rows > 0) 
        {
    
          while($row = $result3->fetch_assoc()) 
          {
                $db_name= $row["student_name"];
                $db_mail= $row["student_mail"];
          }
          
          $sql_ins="INSERT INTO registered_details (st_id, st_password, st_name ,mail_id, contact_no,  gender) VALUES ('$id', '$password', '$db_name', '$db_mail', '$contact','$gender')";

          if ($conn->query($sql_ins) === TRUE) 
          {
             echo "New record created successfully";
          }
          else
          {
            echo "record can not be created";
          }
        }
        else
        {
            echo "error in selecting name and mail id";
        } 

      } 
      else 
      {
        echo "password is incorrect for id= ". $id ;
      }

} else {
    echo "Error: " ."Given student_id does not exists " ."<br>";
}

?>

