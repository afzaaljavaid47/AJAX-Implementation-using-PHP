<?php

$con=mysqli_connect("localhost","root","","best");
$sql="SELECT * FROM `record`";
$run=mysqli_query($con,$sql);
if(mysqli_num_rows($run)>0)
{
	while($data=mysqli_fetch_assoc($run))
	{
		?>
		<tr>
			<td><?php echo $data['id']; ?></td>
			<td><?php echo $data['name']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo $data['father_name']; ?></td>
			<td>
			<a rel="">
            <button class="btn btn-primary">Edit</button></a>		
            </td>
            <td>
			<a class="delele" rel="<?php echo $data['id']; ?>">
            <button class="btn btn-primary">Delete</button></a>		
            </td>
		</tr>
		<?php
	}
}
else
{
	?>
	<tr>
		<td colspan="6">No Record Found !</td>
	</tr>
	<?php
}
if(isset($_POST['dataid']))
{
	$id=$_POST['dataid'];
	$sqll="DELETE FROM `record` WHERE `id`='$id'";
	mysqli_query($con,$sqll);
}
?>
<script type="text/javascript">
$(document).ready(function(){
	$(".delele").on('click',function(){
		var id=$(this).attr('rel');
			if(confirm("Want to Delete Record ?"))
			{
			$.ajax({
			type:'POST',
			url:'show.php',
			data:{dataid:id},
			success:function(data)
			{
				if(!data.error)
				{
					alert("Data Deleted successfully !");
				}
			}
		});		
			}	
	});
});	
</script>
