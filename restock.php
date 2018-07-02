<?php
require_once('conn.php');

$name = $_POST["name"];
$re = $_POST["count"];

if (!($name) || !($re))
{
	echo "<script> alert('Please enter product name and/or restock amount.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

$test = mysqli_query($conn, "SELECT * FROM pduct WHERE pdname='{$name}'");
$test2 = mysqli_fetch_assoc($test);
if ($test2 == 0)
{
	echo "<script> alert('Product not found. Use add new product option.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

$new = $re + $test2["count"];

if (mysqli_query($conn, "UPDATE pduct SET count='{$new}' WHERE pdname='{$name}'"))
{
	echo "<script> alert('Product restocked.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}
else
{
	echo "<script> alert('Product restock failed.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

?>