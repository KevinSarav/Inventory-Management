<?php  
	 //query to select contactId and contactName from master_contacts to populate the select dropdown,
	$conn = mysqli_connect("localhost","root","root","inventorymanagement");
	echo "test";
	$sql = "SELECT contactId, contactName FROM master_contacts
	 where type = 'c'
	 ORDER BY  contactName;";
	
	if($result = mysqli_query($conn,$sql))
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$data[] = $row;
		}
	}
	echo json_encode($data);
	
?>  

