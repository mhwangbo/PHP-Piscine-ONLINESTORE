<?php
require_once('conn.php');
include "header.php";

$data = "SELECT * FROM user";
$result = mysqli_query($conn, $data);
?>
<br /> <br /> <br /> <br /> <br /> <br />
<table align="center">
<tr id="admin1"><th>Username</th><th>Password</th><th>Admin?</th></tr>
<?php
while ($row = mysqli_fetch_assoc($result))
{
	echo "<tr id='admin1'><td>";
	echo ($row["name"]);
	echo "</td><td>";
	echo ($row["pass"]);
	echo "</td><td>";
	echo ($row["admin"]);
	echo "</td></tr>";
}
?>
</table>
<br /> <br /> <br />
<div align="center">
<h2>ADD USER</h1>
<form action="add_user.php" method="POST">
	Username: <br /><input type="text" name="name"><br />
	Password: <br /><input type="text" name="pass"><br />
	Admin?: <br /><input type="text" name="admin"><br />
	<input type="submit" value="OK"><br />
</form>
</div>
<br /> <br /> <br />
<div align="center" title="Warning: DO NOT DELETE admin!">
<h2>DELETE USER</h1>
<form action="rm_user.php" method="POST">
	Username: <br /><input type="text" name="name"><br />
	<input type="submit" value="OK"><br />
</form>
</div>