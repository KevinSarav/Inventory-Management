<?php

//fetch data from master_products

include('database_connection.php');

$query = "SELECT * FROM master_products";
$statement = $connect->prepare($query);
if($statement->execute())
{
	while($row = $statement->fetch(PDO::FETCH_ASSOC))
	{
		$data[] = $row;
	}

	echo json_encode($data);
}

?>