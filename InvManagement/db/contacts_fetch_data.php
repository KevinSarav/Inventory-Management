<?php

//fetch data from master_contacts

include('database_connection.php');

$query = "SELECT * FROM master_contacts";
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