<html>
	<head>
		<link rel="stylesheet" href="cssrailway.css">
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
		

<?php 

include "connect.php";

$sql = "SELECT * FROM rail_form_detail";
$result = $conn->query($sql);

$xml=new DOMDocument("1.0");

$xml->formatOutput=True;
$students=$xml->createElement("students");
$xml->appendChild($students);

while($row=mysqli_fetch_array($result))
{
		$rail_form_detail=$xml->createElement("rail_form_detail");
		$students->appendChild($rail_form_detail);

		$form_id=$xml->createElement("n",$row['form_id']);
		$rail_form_detail->appendChild($form_id);
		$st_id=$xml->createElement("id",$row['st_id']);
		$rail_form_detail->appendChild($st_id);
		$from_station=$xml->createElement("from",$row['from_station']);
		$rail_form_detail->appendChild($from_station);
		$to_station=$xml->createElement("to",$row['to_station']);
		$rail_form_detail->appendChild($to_station);
		$route_name=$xml->createElement("rn",$row['route_name']);
		$rail_form_detail->appendChild($route_name);
		$class_of_travel=$xml->createElement("cot",$row['class_of_travel']);
		$rail_form_detail->appendChild($class_of_travel);
		$duration=$xml->createElement("duration",$row['duration']);
		$rail_form_detail->appendChild($duration);
		$pass_from=$xml->createElement("pf",$row['pass_from']);
		$rail_form_detail->appendChild($pass_from);
		$pass_to=$xml->createElement("pt",$row['pass_to']);
		$rail_form_detail->appendChild($pass_to);
		$previous_pass=$xml->createElement("pass",$row['previous_pass']);
		$rail_form_detail->appendChild($previous_pass);
		$address=$xml->createElement("addr",$row['address']);
		$rail_form_detail->appendChild($address);
		$status=$xml->createElement("st",$row['status']);
		$rail_form_detail->appendChild($status);		

		
}	
// echo "<xmp>".$xml->saveXML()."</xmp>";
$xml->save("reports.xml");
function loadFile($xml, $xsl)
{
$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

$xslDoc = new DOMDocument();
$xslDoc->load($xsl);

$proc = new XSLTProcessor();
$proc->importStyleSheet($xslDoc);
echo $proc->transformToXML($xmlDoc);
}
loadFile("reports.xml", "table_output.xsl");
?>
<br> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="footer-distributed col-md-12" id="myFooter">            
	   <div class="container text-center">
		   <div class="footer-left col-sm-4">
				<a href="#">Made by The Triplets</a>
			</div>
			<div class="footer-center col-sm-4">          			
				<a href="index.html/#about">About Us</a>
				<a href="index.html/#contact">Contact Us</a> 
			</div>
			<div class="footer-right social-icons col-sm-4">
				<a href="#" class="icon"><i class="fa fa-twitter"></i></a>
				<a href="#" class="icon"><i class="fa fa-facebook"></i></a>
				<a href="#" class="icon"><i class="fa fa-github"></i></a>
			</div>
		</div>        
	</footer>
	</body>

</html>
