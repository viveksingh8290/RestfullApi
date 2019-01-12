<?php
header("Content-Type:application/json");
require "data.php";

if(!empty($_GET['name']))
{
	$name=$_GET['name'];
	$record = get_record($name);

	if(empty($record))
	{
		echo "Record not found";
	}
	else
	{
		$json_response = json_encode($record);
		echo $json_response;
	}
	
}
else
{
	echo "Invalid request";
}
?>