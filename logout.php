<?php
require_once('conn.php');

session_start();

setcookie(session_name(), '', time()-999999);
session_destroy();

?>
<meta http-equiv='refresh' content="0;url=index.php">