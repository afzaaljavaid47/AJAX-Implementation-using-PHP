if(isset($_POST['dataid']))
{
	$id=$_POST['dataid'];
	$sqll="DELETE FROM `record` WHERE `id`='$id'";
	mysqli_query($con,$sqll);
}