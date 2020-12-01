<?php
session_start();

include 'function.php';

if ($_SESSION['status'] !="LOGIN") {
	header("Location: login.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
</head>
<body>
	<a href="logout.php">Logout</a>

</body>
</html>