<?php
require_once('conn.php');

$name = $_POST["name"];

if (!($name))
{
	echo "<script> alert('Please enter a product name.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

$test = mysqli_query($conn, "SELECT * FROM pduct WHERE pdname='{$name}'");
$test2 = mysqli_fetch_assoc($test);
if ($test2 == 0)
{
	echo "<script> alert('Product not found.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

if (mysqli_query($conn, "DELETE FROM pduct WHERE pdname='{$name}'"))
{
	echo "<script> alert('Product successfully deleted.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}
else
{
	echo "<script> alert('Product delete failed.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

?>