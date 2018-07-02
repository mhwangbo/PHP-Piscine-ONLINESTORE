<?php

$servername = "localhost";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS myDB";
mysqli_query($conn, $sql);
mysqli_select_db($conn, "myDB");

$tbl1 = "CREATE TABLE IF NOT EXISTS pduct (
image TEXT,
price FLOAT(8,2),
pdname VARCHAR(100),
count INT(6),
sel INT(6),
cat VARCHAR(15),
genre VARCHAR(15)
)";
mysqli_query($conn, $tbl1);

$tbl2 = "CREATE TABLE IF NOT EXISTS user (
idx INT(6) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(15),
pass VARCHAR(20),
admin VARCHAR(3)
)";
mysqli_query($conn, $tbl2);

$tbl3 = "CREATE TABLE IF NOT EXISTS orders (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
user VARCHAR(15),
total FLOAT(8, 2),
pdlist TEXT
)";
mysqli_query($conn, $tbl3);

$tbl4 = "CREATE TABLE IF NOT EXISTS cart (
order_no INT(6) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
price FLOAT(8, 2),
quantity INT(11),
pdname VARCHAR(50)
)";
mysqli_query($conn, $tbl4);

$result1 = mysqli_query($conn, "SELECT * FROM user WHERE name='admin'");
if (mysqli_num_rows($result1) == 0)
	mysqli_query($conn, "INSERT INTO user (name, pass, admin) VALUES ('admin', 'admin', 'yes')");

$result2 = mysqli_query($conn, "SELECT * FROM pduct WHERE pdname='Harry Potter'");
if (mysqli_num_rows($result2) == 0)
{
	$insert = "INSERT INTO pduct (image, price, pdname, count, sel, cat, genre) VALUES ('https://d3525k1ryd2155.cloudfront.net/f/758/281/9780807281758.RH.0.m.jpg', 27.25, 'Harry Potter', 50, 0, 'fiction', 'children');";
	$insert .= "INSERT INTO pduct (image, price, pdname, count, sel, cat, genre) VALUES ('https://images-na.ssl-images-amazon.com/images/I/51tW-UJVfHL._SX321_BO1,204,203,200_.jpg', 555.02, 'Lord of the Rings', 125, 0, 'fiction', 'action');";
	$insert .= "INSERT INTO pduct (image, price, pdname, count, sel, cat, genre) VALUES ('https://prodimage.images-bn.com/pimages/9781118051078_p0_v2_s550x406.jpg', 32.85, 'Beginning Programming for DUMMIES', 64, 0, 'nonfiction', 'nonfiction');";
	$insert .= "INSERT INTO pduct (image, price, pdname, count, sel, cat, genre) VALUES ('https://prodimage.images-bn.com/pimages/9780316194761_p0_v2_s550x406.jpg', 11.26, 'Michael Jordan: The Life', 23, 0, 'nonfiction', 'nonfiction');";
	$insert .= "INSERT INTO pduct (image, price, pdname, count, sel, cat, genre) VALUES ('https://prodimage.images-bn.com/pimages/9780763642686_p0_v1_s550x406.jpg', 14.99, 'The Odyssey', 38, 0, 'fiction', 'action');";
	$insert .= "INSERT INTO pduct (image, price, pdname, count, sel, cat, genre) VALUES ('https://upload.wikimedia.org/wikipedia/en/1/1d/Twilightbook.jpg', 44.11, 'Twilight', 41, 0, 'fiction', 'romance');";
	$insert .= "INSERT INTO pduct (image, price, pdname, count, sel, cat, genre) VALUES ('https://upload.wikimedia.org/wikipedia/en/3/39/The_Hunger_Games_cover.jpg', 27.99, 'Hunger Games', 111, 0, 'fiction', 'action');";
	$insert .= "INSERT INTO pduct (image, price, pdname, count, sel, cat, genre) VALUES ('https://upload.wikimedia.org/wikipedia/en/e/e4/Ender%27s_game_cover_ISBN_0312932081.jpg', 61.23, 'Enders  Game', 66, 0, 'fiction', 'children');";
	$insert .= "INSERT INTO pduct (image, price, pdname, count, sel, cat, genre) VALUES ('https://images-na.ssl-images-amazon.com/images/I/51FMxz1kEUL._SX317_BO1,204,203,200_.jpg', 80.65, 'Romeo and Juliet', 33, 0, 'fiction', 'romance');";
	$insert .= "INSERT INTO pduct (image, price, pdname, count, sel, cat, genre) VALUES ('https://img.thriftbooks.com/api/images/l/7593e25fd1cc1fb2d33d3bb78a81512cc43c296c.jpg', 17.72, 'NFL Football', 65, 0, 'nonfiction', 'nonfiction')";
	mysqli_multi_query($conn, $insert);
}

mysqli_close($conn);

?>
