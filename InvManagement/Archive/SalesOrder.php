<?php

//selectSoInfo is stored procedure to display contact, product, cost and quantity of a sales order.

$conn = mysqli_connect("localhost","root","root","inventorymanagement");

$sql = "CALL selectSoInfo();";
if($result = mysqli_query($conn,$sql))
{
	while($row = mysqli_fetch_assoc($result))
	{
		$data[] = $row;
	}
	//echo $data[0]['contactName'];
	echo json_encode($data);
}
?>