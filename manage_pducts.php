<?php
require_once('conn.php');
include "header.php";

$data = "SELECT * FROM pduct";
$result = mysqli_query($conn, $data);
?>
<br /> <br /> <br /> <br /> <br /> <br />
<table align="center">
<tr id="admin1"><th>Name</th><th>Price</th><th>Stock</th><th>Category</th><th>Genre</th></tr>
<?php
while ($row = mysqli_fetch_assoc($result))
{
	$stock = $row['count'] - $row['sel'];
	echo "<tr id='admin1'><td>";
	echo ($row["pdname"]);
	echo "</td><td>";
	echo ($row["price"]);
	echo "</td><td>";
	echo ($stock);
	echo "</td><td>";
	echo ($row["cat"]);
	echo "</td><td>";
	echo ($row["genre"]);
	echo "</td></tr>";
}
?>
</table>
<br /> <br /> <br />
<div align="center">
<h2>ADD NEW PRODUCT</h1>
<form action="add_product.php" method="POST">
	Name: <br /><input type="text" name="name"><br />
	Price: <br /><input type="number" name="price" step="0.01"><br />
	Stock: <br /><input type="number" name="count"><br />
	Category(fiction/nonfiction): <br /><input type="text" name="cat"><br />
	Genre(action/romance/children): <br /><input type="text" name="genre"><br />
	Image URL: <br /><input type="text" name="url"><br />
	<input type="submit" value="OK"><br />
</form>
</div>
<br /> <br /> <br />
<div align="center">
<h2>RESTOCK EXISTING PRODUCT</h1>
<form action="restock.php" method="POST">
	Name: <br /><input type="text" name="name"><br />
	Restock: <br /><input type="number" name="count"><br />
	<input type="submit" value="OK"><br />
</form>
</div>
<br /> <br /> <br />
<div align="center" title="Warning: DO NOT DELETE Harry Potter!">
<h2>REMOVE PRODUCT</h1>
<form action="rm_product.php" method="POST">
	Name: <br /><input type="text" name="name"><br />
	<input type="submit" value="OK"><br />
</form>
</div>