
	
<?php


if(isset($_POST["submit"]))
{  
  
	if(!empty($_POST['user']) && !empty($_POST['pass']))
	{  
	    $user=$_POST['user'];  
	    $pass=$_POST['pass'];  
	  	
	  	$servername = "localhost";
		$username = "root";
		$pwd = "kaizala";
		$dbname = "railway";
		$table_name = "login_details";
	    $conn = new mysqli($servername, $username, $pwd, $dbname);
	  
	    $query=mysqli_query($conn, "SELECT * FROM $table_name WHERE username='".$user."' AND password='".$pass."'");  
	    $numrows=mysqli_num_rows($query);  
	    if($numrows!=0)  
	    {  
		    while($row=mysqli_fetch_assoc($query))  
		    {  
			    $dbusername=$row['username'];  
			    $dbpassword=$row['password'];  
		    }  
	  	
		    if($user == $dbusername && $pass == $dbpassword)  
		    {  
		    	$sql = "DELETE FROM $table_name WHERE username=$user";
				if(mysqli_query($conn, $sql))
				{
			   	 	echo "Records were deleted successfully.";
				} 
				else
				{
			    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				}
			}
		    /* Redirect browser */  
		    header("Location: login.html");  
		}  
		else 
		{  
		   	echo "Invalid username or password!";  
		}  
	  
	} 
	else 
	{  
	    echo "All fields are required!";  
	}  

}  

?>

</html>