<?php

$brand = $_GET["brand"];
$model = $_GET["model"];
$start_price = $_GET["start_price"];
$end_price = $_GET["end_price"];
$ram = $_GET["ram"];
$os = $_GET["os"];
$rear_camera = $_GET["rear_camera"];
$front_camera = $_GET["front_camera"];
$battery = $_GET["battery"];

$condition = "";

if (!$brand == "Any") $condition = $condition . "brand = '" . $brand . "'";

if (!$model == "")
{
	if (!$condition == "") $condition = $condition . " AND ";
	$condition = $condition . "model LIKE '%" . $model . "%'";
}

if (!$start_price == "")
{
	if (!$condition == "") $condition = $condition . " AND ";
	$condition = $condition . "price >= " . $start_price;
}

if (!$end_price == "")
{
	if (!$condition == "") $condition = $condition . " AND ";
	$condition = $condition . "price <= " . $end_price;
}

if (!$os == "")
{
	if (!$condition == "") $condition = $condition . " AND ";
	$condition = $condition . "os = '" . $os . "'";
}

if (!$ram == "")
{
	if (!$condition == "") $condition = $condition . " AND ";
	$condition = $condition . "ram >= " . $ram;
}

if (!$front_camera == "")
{
	if (!$condition == "") $condition = $condition . " AND ";
	$condition = $condition . "front_camera >= " . $front_camera;
}

if (!$rear_camera == "")
{
	if (!$condition == "") $condition = $condition . " AND ";
	$condition = $condition . "rear_camera >= " . $rear_camera;
}

if (!$battery == "")
{
	if (!$condition == "") $condition = $condition . " AND ";
	$condition = $condition . "battery >= " . $battery;
}

?>