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