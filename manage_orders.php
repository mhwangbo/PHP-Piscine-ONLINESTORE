<?php
require_once('conn.php');
include "header.php";

$data = "SELECT * FROM orders";
$result = mysqli_query($conn, $data);
?>
<br /> <br /> <br /> <br /> <br /> <br />
<table align="center">
<tr id="admin1"><th>Order Num</th><th>Username</th><th>Total Cost</th><th>Products</th></tr>
<?php
while ($row = mysqli_fetch_assoc($result))
{
	echo "<tr id='admin1'><td>";
	echo ($row["id"]);
	echo "</td><td>";
	echo ($row["user"]);
	echo "</td><td>";
	echo ($row["total"]);
	echo "</td><td>";
	echo ($row["pdlist"]);
	echo "</td></tr>";
}
?>
</table>
<br /> <br /> <br />
<div align="center">
<h2>DELETE ORDER</h1>
<form action="rm_order.php" method="POST">
	Order Number: <br /><input type="number" name="id"><br />
	<input type="submit" value="OK"><br />
</form>
</div>
