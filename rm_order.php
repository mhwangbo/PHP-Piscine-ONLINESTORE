<?php
require_once('conn.php');

$id = $_POST["id"];

if (!($id))
{
	echo "<script> alert('Please enter an order number.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

$test = mysqli_query($conn, "SELECT * FROM orders WHERE id='{$id}'");
$test2 = mysqli_fetch_assoc($test);
if ($test2 == 0)
{
	echo "<script> alert('Order not found.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

if (mysqli_query($conn, "DELETE FROM orders WHERE id='{$id}'"))
{
	echo "<script> alert('Order successfully deleted.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}
else
{
	echo "<script> alert('Order delete failed.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

?>