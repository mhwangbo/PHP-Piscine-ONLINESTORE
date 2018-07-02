<?php
require_once('conn.php');

session_start();
?>

<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="drop_menu.css">
	<title>Online Store</title>
</head>
<body leftmargin="0" topmargin="0">

<div class="top_block block">
	<div class="menu_b">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="category.php">All</a></li>
			<li><a href="category.php?cat='fiction'">Fiction</a>
				<ul>
					<li><a href="category.php?cat='fiction'&&genre='action'">Action</a></li>
					<li><a href="category.php?cat='fiction'&&genre='children'">Children</a></li>
					<li><a href="category.php?cat='fiction'&&genre='romance'">Romance</a></li>
				</ul>
			</li>
			<li><a href="category.php?cat='nonfiction'">Non-Fiction</a>
				<ul>
					<li><a href="category.php?cat='nonfiction'&&genre='action'">Action</a></li>
					<li><a href="category.php?cat='nonfiction'&&genre='children'">Children</a></li>
					<li><a href="category.php?cat='nonfiction'&&genre='nonfiction'">Non-Fiction</a></li>
					<li><a href="category.php?cat='nonfiction'&&genre='romance'">Romance</a></li>
				</ul>
			</li>
<?php
	if (isset($_SESSION['logged_on_user']))
	{
		$name = $_SESSION['logged_on_user'];
		$sql = "SELECT * FROM user WHERE admin='yes' and name='{$name}'";
		$resource = mysqli_query($conn, $sql);
		$num = mysqli_fetch_assoc($resource);
		if ($num > 0)
		{
?>
			<li><a href="admin.php">Admin</a></li>
<?php
		}
?>
<a href="cart.php">
<img src="resources/cart.png" title="cart" alt="cart" id="cart"/></a>
<?php
	}
?>
		</ul>
	</div>
</div>
