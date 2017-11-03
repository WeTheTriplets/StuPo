<?php
session_start();
include "connect.php";
?>
<html>
	<head>
	
		<link rel="stylesheet" href="hdrftr.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		
	</head>
	<body>
		<div class="header">
			<fieldset>
				<a href="stupo.html"><img class="logo" src="StuPoLogo.png"></a>
				<a href="stupo.html"><button name="stupo" type="button" id="stupo">Student Portal</button></a>					  			 
				
				<a href="login.html"><button name="login" type="button" id="login">LOG OUT</button></a>	
			</fieldset>
			<fieldset><ul>			
				<li><a class="active" href="stupo.html">Home</a></li>
				<li><a href="#blah">Template</a></li>
				<li><a href="#blah">What's New</a></li>
				<li><a href="#blah">About Us</a></li>
				<li><a href="#blah">Contact Us</a></li>
			</ul></fieldset>
		</div>		
		
			
		<div class="container">
			<div class='control-buttons'>
				<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
					<div class="main-container">
						<fieldset class="col-xs-4">
					<label >Search by student name</label><br>
					<input  name='name' class="form-control"  placeholder="search by name">
					<br>
						</fieldset>
						<fieldset class="col-xs-4">
					<label  >Search by student id</label><br>
					<input name='student_id' class="form-control "   placeholder="search by id">
				
						</fieldset>
						<fieldset class="col-xs-4">
					<label >search by railway pass --from date </label><br>
					<input  name='from_date' type="date"  class="form-control" max="<?php echo date('Y-m-d'); ?>" >
						</fieldset>
						
					<br>
					</div>

					<div class='control-buttons'>
						<fieldset class="col-xs-6 col-lg-offset-0" style="margin-top: 10px; padding-top: 10px;">
						<button  type="submit"  name="submit" class="btn btn-info col-xs-4" > search </button>
						<button  class='btn btn-warning col-xs-4' type="reset"  id="reset" onclick="alert('Reset... Are you sure?')">reset</button>
						</fieldset>
					</div>
					
				</form>
			



			<?php
			
				$sql = "SELECT * FROM rail_form_detail ";
				$result = $conn->query($sql);
			
				
			if($_SERVER["REQUEST_METHOD"] == "POST")
			{	

				
				$student_id = $date_from= $date_from= $name =$formIdsStr= "";
				$student_id  = $_POST['student_id'];
				$date_from  = $_POST['from_date'];
				
				$name= $_POST['name'];
				
				if($date_from && $student_id)
				{
					$student_id  = $_POST['student_id'];
					$date_from  = $_POST['from_date'];
					
					echo "details for student id => ".$student_id ;
					echo " pass from ". $date_from ;
					$sql = "SELECT * FROM rail_form_detail WHERE st_id ='$student_id' AND pass_from >'$date_from' ";
					$result = $conn->query($sql);
				}

				else if($name && $student_id && $date_from)
				{
					$name=$_POST['name'];
					$date_from  = $_POST['from_date'];
					$student_id  = $_POST['student_id'];
					$sql2="SELECT student_id from student where student_name like '%$name%' ";
					$results=$conn->query($sql2);
					while($row0 = $results->fetch_assoc())
						{
							$id=$row0['student_id'];
						}
					$sql = "SELECT * FROM rail_form_detail where st_id= '$id' AND pass_from >'$date_from' ";
					$result = $conn->query($sql);

				}

						

				else if($date_from)
				{
					$date_from  = $_POST['from_date'];
					echo "pass from  ". $date_from ;
					$sql = "SELECT * FROM rail_form_detail WHERE pass_from >'$date_from' ";
					$result = $conn->query($sql);
				}

				else if($name)
				{
					$name=$_POST['name'];
					$sql2="SELECT student_id from student where student_name like '%$name%' ";
					$results=$conn->query($sql2);
					while($row0 = $results->fetch_assoc())
						{
							$id=$row0['student_id'];
						}
					$sql = "SELECT * FROM rail_form_detail where st_id= '$id' ";
					$result = $conn->query($sql);

				}
				else if($student_id)
				{
					$student_id  = $_POST['student_id'];
					echo "details for id => ".$student_id ;
					$sql = "SELECT * FROM rail_form_detail WHERE st_id ='$student_id' ";
					$result = $conn->query($sql);
						
				} 

				else
				{
					echo "please provide input";
					exit(0);
				}
				
			}
						echo "<table >";
					    echo "<tr>";
					    echo "<th>Form ID</th>";
					    echo "<th>Student ID</th>";
					    echo "<th>From Station</th>";
					    echo "<th>To Station</th>";
					    echo "<th>Route Name</th>";
					    echo "<th>Class Of Travel</th>";
					    echo "<th>Duration</th>";
					    echo "<th>Pass from</th>";
					    echo "<th>Pass to</th>";
					    echo "<th>Previous Pass</th>";
					    echo "<th>Address</th>";
					    echo "<th></th>";
					    echo "</tr>";     
					    while ($row = $result->fetch_assoc()) 
					    {
					        $id = $row['form_id'];
					        echo '<tr>';
					        echo "<td>" . $row['form_id'] . "</td>" ;
					        echo "<td>" . $row['st_id'] . "</td>" ;
					        echo "<td>" . $row['from_station'] . "</td>" ;
					        echo "<td>" . $row['to_station'] . "</td>"; 
					        echo "<td>" . $row['route_name'] . "</td>"; 
					        echo "<td>" . $row['class_of_travel'] . "</td>"; 
					        echo "<td>" . $row['duration'] . "</td>"; 
					        echo "<td>" . $row['pass_from'] . "</td>"; 
					        echo "<td>" . $row['pass_to'] . "</td>"; 
					        echo "<td>" . $row['previous_pass'] . "</td>"; 
					        echo "<td>" . $row['address'] . "</td>"; 
					        echo "<td>  <input type= \"submit\" style= \"cursor:pointer\" value = \"Approve\" name = \"submit\" class = \"button\" onclick = \"myAjax($id)\"; >  </td>";
					        echo "</tr>";
					    }
					    echo '</table>';
				
			?>	
			
		
		</div>
	</div>
	</body>
</html>