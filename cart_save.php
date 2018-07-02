<?php
require_once('conn.php');

session_start();

if (!$_POST['count'])
	$count = 1;
else
	$count = $_POST['count'];
$name = $_POST['pdname'];
$user = $_SESSION['logged_on_user'];

if (!$user)
{
		echo "<script> alert('Not logged in');</script>";
		echo "<script>window.history.back();</script>";
		exit ();
}

$result = mysqli_query($conn, "SELECT * FROM pduct WHERE pdname='${name}'");
$data = mysqli_fetch_assoc($result);
$price = $data["price"];

$test = mysqli_query($conn, "SELECT * FROM cart WHERE pdname='{$name}'");
$test2 = mysqli_fetch_assoc($test);

if ($test2 > 0)
{
	$new = $count + $test2["quantity"];
	if (mysqli_query($conn, "UPDATE cart SET quantity='{$new}' WHERE pdname='{$name}'"))
	{
		echo "<script> alert('Cart updated.');</script>";
		echo "<script>window.history.back();</script>";
		exit();
	}
	else
	{
		echo "<script> alert('Cart update failed.');</script>";
		echo "<script>window.history.back();</script>";
		exit();
	}
}
else
{
	if (mysqli_query($conn, "INSERT INTO cart (name, price, quantity, pdname) VALUES ('{$user}', '{$price}', '{$count}', '{$name}')"))
	{
		echo "<script> alert('Cart updated.');</script>";
		echo "<script>window.history.back();</script>";
		exit();
	}
	else
	{
		echo "<script> alert('Cart update failed.');</script>";
		echo "<script>window.history.back();</script>";
		exit();
	}
}
?>
