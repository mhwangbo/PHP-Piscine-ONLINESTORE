<?php
require_once('conn.php');

$name = $_POST["name"];

if (!($name))
{
	echo "<script> alert('Please enter a Username.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

$test = mysqli_query($conn, "SELECT * FROM user WHERE name='{$name}'");
$test2 = mysqli_fetch_assoc($test);
if ($test2 == 0)
{
	echo "<script> alert('Username not found.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

if (mysqli_query($conn, "DELETE FROM user WHERE name='{$name}'"))
{
	echo "<script> alert('User successfully deleted.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}
else
{
	echo "<script> alert('User delete failed.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

?>