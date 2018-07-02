<?php
require_once('conn.php');

$name = $_POST["name"];
$price = $_POST["price"];
$count = $_POST["count"];
$cat = $_POST["cat"];
$genre = $_POST["genre"];
$url = $_POST["url"];

if (!($name) || !($price) || !($count))
{
	echo "<script> alert('Please enter product name, price and/or stock.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

$test = mysqli_query($conn, "SELECT * FROM pduct WHERE pdname='{$name}'");
$test2 = mysqli_fetch_assoc($test);
if ($test2 > 0)
{
	echo "<script> alert('Product already exists. Use restock option to restock');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

$insert = mysqli_query($conn, "INSERT INTO pduct (pdname, price, count, sel, cat, genre, image) VALUES ('{$name}', '{$price}', '{$count}', '0', '{$cat}', '{$genre}', '{$url}')");
if ($insert)
{
	echo "<script> alert('Product added.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}
else
{
	echo "<script> alert('Product add failed.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

?>