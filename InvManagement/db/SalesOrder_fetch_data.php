<?php

//fetch_data.php

//include('database_connection.php');
$conn = mysqli_connect("localhost","root","root","inventorymanagement");

$sql = "CALL selectSoInfo();";
if($result = mysqli_query($conn,$sql))
{
	while($row = mysqli_fetch_assoc($result))
	{
		$data[] = $row;
	}
}
echo json_encode($data);
?>