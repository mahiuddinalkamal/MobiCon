<?php 

include "connect.php";

$response = array();
$response["success"] = 0;
$response["data"] = array();

$sql = $_GET["sql"];
$result = mysql_query($sql);

if(mysql_error()) goto end;

$response["success"] = 1;

while($row = mysql_fetch_array($result))
{
	array_push($response["data"],$row);
}

end:
echo json_encode($response);

?>		