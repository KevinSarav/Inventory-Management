<?php


//sql queries to insert, delete data from database
//the result is passed back as a jason dataset.
//fet_single_data allows to dynamically filter contacts.

include('database_connection.php');

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$productNameName = '';
$salePrice = '';
$qty = '';


if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM master_products WHERE id='".$form_data->id."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['productName'] = $row['productName'];
		$output['salePrice'] = $row['salePrice'];
		$output['qty'] = $row['qty'];
	}
}

else
{
	if(empty($form_data->productName))
	{
		
		$error[] = 'Product Name is required';
		
	}
	else
	{
		$productName = $form_data->productName;
		
	}

	if(empty($form_data->salePrice))
	{
		$error[] = 'Please sale price';
	}
	else
	{
		$salePrice = $form_data->salePrice;
	}

	if(empty($form_data->qty))
	{
		$error[] = 'Please Quantity';
	}
	else
	{
		$qty = $form_data->qty;
	}
	if(empty($error))
	{
		if($form_data->action == 'Insert')
		{
			$data = array(
				':productName'	=>	$productName,
				':salePrice'	=>	$salePrice,
				':qty'	=>	$qty
				
			);
			$query = "
			INSERT INTO master_products 
				(productName, salePrice, qty) VALUES 
				(:productName, :salePrice, :qty)
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