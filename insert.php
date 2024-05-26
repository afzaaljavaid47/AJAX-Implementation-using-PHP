<?php

if(isset($_POST))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$fname=$_POST['fname'];
	$con=mysqli_connect("localhost","root","","best");
    $sql="INSERT INTO `record`(`name`, `email`, `father_name`) VALUES ('$name','$email','$fname')";
	mysqli_query($con,$sql);	
}

?>