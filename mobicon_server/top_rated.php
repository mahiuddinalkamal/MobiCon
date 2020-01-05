<?php 

include "connect.php";

$response = array();
$response["success"] = 0;
$response["data"] = array();

$sql = 
"SELECT a.mobile_id, brand, model, price, avg_rating FROM
mobile_info a JOIN
(SELECT mobile_id, ROUND(AVG(rating),1) avg_rating FROM user_rating GROUP BY mobile_id) b
ON a.mobile_id = b.mobile_id
ORDER BY avg_rating DESC LIMIT 10";

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
	$single_info["avg_rating"] = $row["avg_rating"];
		
	array_push($response["data"],$single_info);
}

end:
echo json_encode($response);

?>		