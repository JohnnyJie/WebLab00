<!DOCTYPE html>
<html>
	<head>
		<title>Grade Store</title>
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2015/problems/pResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php
			$name =$_POST['name'];
			$id = $_POST['id'];
			$selectedcourses=processCheckbox();
			$selectedgrade=$_POST['Grade'];
			$creditcardnumber=$_POST['Credit'];
			$type=$_POST['cc'];
			
		?>
		<?php
		
		function file_put($str){
				$filename = "loosers.txt";
				//global $filename; 
				file_put_contents($filename,$str,FILE_APPEND);
			}
		if (isset($name)) {
			
			if($name==""){
				Header("Location: wrong.php");	
			}else{
				
				/*
				if(preg_match("/^[a-zA-Z_\-]+@(([a-zA-Z_\-])+\.)+[a-zA-Z]{2,4}$/", $name)){
													echo "ddd";
												}*/
				if(!preg_match("/^[A-Za-z]*[\-]*[^(\s\-)]+[\s]?[A-Za-z]*$/", $name)){
					Header("Location: wrong.php");						
				
				}else{
					/*
					if(preg_match("/(\-\s)+/", $name)){
											Header("Location: wrong.php");
										}*/
					
				}
				if (isset($id) ){
					if($id==""){
						Header("Location: wrong.php");	
					}else{
						if (isset($selectedcourses)) {
							if($selectedcourses==""){
								Header("Location: wrong.php");	
							}else{
								//sss
								if (isset($selectedgrade)) {
									if($selectedgrade==""){
										Header("Location: wrong.php");	
									}else{
										//ddd
										if (isset($creditcardnumber)) {
											if($creditcardnumber==""){
												Header("Location: wrong.php");	
											}else{
												if(!preg_match("/^\d{16}$/", $creditcardnumber)){
													Header("Location: wrong.php");						
												}
												//tt
												if (isset($type)) {
													if($type==""){
														Header("Location: wrong.php");	
													}else{
														if($type=="visa"){
															if(!preg_match("/^4/", $creditcardnumber)){
																Header("Location: wrong.php");	
															}else{
																$str=$name.";".$id.";".$creditcardnumber.";".$type."\n";
			
																file_put($str);
															}
														}else{
															if($type=="mastercard"){
																if(!preg_match("/^5/", $creditcardnumber)){
																	Header("Location: wrong.php");	
																}else{
																	$str=$name.";".$id.";".$creditcardnumber.";".$type."\n";
			
																	file_put($str);
																}
															}
														}
														
													}
												} else {
													Header("Location: wrong.php");	
												}
												//tt
											}
										} else {
											Header("Location: wrong.php");	
										}
										//ddd	
									}
								} else {
									Header("Location: wrong.php");	
								}
								
								//sss
							}
						} else {
							Header("Location: wrong.php");	
						}			
					}				
				} else {
					Header("Location: wrong.php");	
				}		 
			}	
		}else{
			Header("Location: wrong.php");
		} 
				
				
		
		?>
		 <?php
		# Ex 4 : 
				# Check the existance of each parameter using the PHP function 'isset'.
				# Check the blankness of an element in $_POST by comparing it to the empty string.
				# (can also use the element itself as a Boolean test!)
				# if (){
		
		?>
		
		
		

		<!-- Ex 4 : 
			Display the below error message : 
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. Try again?</p>
		--> 

		<?php
		# Ex 5 : 
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		# } elseif () { 
		?>

		<!-- Ex 5 : 
			Display the below error message : 
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>
		--> 

		<?php
		# Ex 5 : 
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5. 
		# } elseif () {
		?>

		<!-- Ex 5 : 
			Display the below error message : 
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>
		--> 

		<?php
		# if all the validation and check are passed 
		# } else {
		?>

		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>
		
		<!-- Ex 2: display submitted data -->
		
		<ul> 
			<li>Name: <?=$name?> 
				</li>
			<li>ID:<?=$id ?>  </li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course:<?=$selectedcourses?>  </li>
			<li>Grade: <?=$selectedgrade?> </li>
			<li>Credit: <?=$creditcardnumber?>(<?=$type?>) </li>
		</ul>
		
		<p>Here are all the looser who have submiteed here</p>
		
		
		<!-- Ex 3 : 
			<p>Here are all the loosers who have submitted here:</p> -->
		<?php
			$filename = "loosers.txt";
			
			
			
			file_output();
			function file_output()
			{
				global $filename; 
				echo "<p>".str_replace("\n","<br>",file_get_contents($filename))."</p>";
			}
			/* Ex 3: 
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
		?>
		
		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->

		
		<?php
		# }
		?>
		
		<?php
			/* Ex 2: 
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 * 
			 * The function checks whether the checkbox is selected or not and 
			 * collects all the selected checkboxes into a single string with comma seperation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
				$check=$_POST['check'];
					return implode(',',$check);
			}
			
		?>
		
	</body>
</html>
