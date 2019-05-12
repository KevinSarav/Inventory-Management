<?php

//insert.php
//sql queries to insert, delete data from database
//the result is passed back as a jason dataset.
//fet_single_data allows to dynamically filter contacts.

include('database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$contactName = '';
$type = '';



if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM master_contacts WHERE id='".$form_data->id."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['contactName'] = $row['contactName'];
		$output['type'] = $row['type'];
	}
}

else
{
	if(empty($form_data->contactName))
	{
		
		$error[] = 'Contact Name is required';
		
	}
	else
	{
		$contactName = $form_data->contactName;
	}

	if(empty($form_data->type))
	{
		$error[] = 'Please enter type';
	}
	else
	{
		$type = $form_data->type;
	}

	if(empty($error))
	{
		if($form_data->action == 'Insert')
		{
			$data = array(
				':contactName'	=>	$contactName,
				':type'		=>	$type
				
			);
			$query = "
			INSERT INTO master_contacts 
				(contactName, type) VALUES 
				(:contactName, :type)
			";
			$statement = $connect->prepare($query);
			if($statement->execute($data))
			{
				$message = 'Data Inserted';
			}
		}
		
	}
	else
	{
		$validation_error = implode(", ", $error);
	}

	$output = array(
		'error'		=>	$validation_error,
		'message'	=>	$message
	);

}

echo json_encode($output);

?>