<?php
require_once("conn.php");

$name = $_POST["name"];
$pass = $_POST["pass"];
$admin = $_POST["admin"];

if (!($name) || !($pass))
{
	echo "<script> alert('Please enter a Username and/or Password.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

$test = mysqli_query($conn, "SELECT * FROM user WHERE name='{$name}'");
$test2 = mysqli_fetch_assoc($test);
if ($test2 > 0)
{
	echo "<script> alert('Username already in use.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}

$insert = mysqli_query($conn, "INSERT INTO user (name, pass, admin) VALUES ('{$name}', '{$pass}', '{$admin}')");
if ($insert)
{
	echo "<script> alert('Registeration completed.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}
else
{
	echo "<script> alert('Registeration failed.');</script>";
	echo "<script>window.history.back();</script>";
	exit();
}
?>