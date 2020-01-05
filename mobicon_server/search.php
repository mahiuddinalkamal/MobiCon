<?php 

include "connect.php";
include "search_condition.php";

$response = array();
$response["success"] = 0;
$response["data"] = array();

$sql = 
"SELECT mobile_id, brand, model, price FROM
mobile_info";

if(!$condition == "") $sql = $sql . " WHERE " . $condition;

$result = mysql_query($sql);

if(mysql_error()) goto end;

$response["success"] = 1;

while($row = mysql_fetch_array($result))
{
	$single_info = array();
		
	$single_info["mobile_id"] = $row["mobile_id"];
	$single_info["brand"] = $row["brand"];
	$single_info["model"] = $row["model"];
	$single_info["price"] = $row["price"];
		
	array_push($response["data"],$single_info);
}

end:
echo json_encode($response);

?>		