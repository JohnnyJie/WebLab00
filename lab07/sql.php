<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>test</title>
</head>

<body>

<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<div>
    	DatabaseName: <input type="text" name="dbName" /> <br />
    	SQL query: <input type="text" name="mySql" /> <br />
    	<input type="submit" />
 	<div>
</form>



<?php
	$dbName='';
	$mySql='';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  		 if (!empty($_POST["dbName"])) {
    		// echo  $_POST["dbName"];
			 //echo $_POST["mySql"];
  	 	}
	}
	$dbName=$_POST["dbName"];
	$mySql=$_POST["mySql"];
	
		$con =new PDO("mysql:host=localhost;port=3306;dbname=$dbName","root","root");
	
	  
	      
		  $result =$con->query($mySql);
		  
		  while($row = $result->fetch())
	  	{
	  		print_r($row) ;
			//echo $row['name'] . " " . $row['year'];
			echo "<br />";
	 	}
	

	
	
	
	// some code

?>

</body>
</html>
