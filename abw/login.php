<?php 
session_start();

$koneksi = mysqli_connect('localhost','root','','db_abw');

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $cek_user = mysqli_query($koneksi,
	"SELECT * FROM tb_user WHERE tb_user.username = '$username' AND tb_user.password = '$password' LIMIT 1");

    $cek = mysqli_num_rows($cek_user);

    if ($cek > 0) {
	$data_user = mysqli_fetch_assoc($cek_user);

	$_SESSION['status'] = "LOGIN";
	$_SESSION['username'] = $username;
	$_SESSION['id_user'] = $data_user['id_user'];
	header('Location: index.php');
	exit();

    } else {
	$_SESSION['gagal_login'] = "USERNAME ATAU PASSWORD ANDA SALAH";
	header('Location: login.php');
	exit();
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="logo.svg">
    <link rel="stylesheet" href="style.css">
    <link href="gg.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="font-awesome">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <title>Face ID</title>
</head>

<body>
    <img src="logo.svg" alt="">
    <div class="animation-area">
	<ul class="box-area">
	    <li></li>
	    <li></li>
	    <li></li>
	    <li></li>
	    <li></li>
	    <li></li>
	</ul>
    </div>
    <div class="main">
	<p class="sign" align="center">Sign In</p>
	<?php if(isset($_SESSION['gagal_login'])) {
	    echo "<p>".$_SESSION['gagal_login']."</p>";
	} ?>
	<form class="form1" action="" method="POST">
	    <input class="un" type="text" name="username" align="center" placeholder="Username" required autocomplete="OFF">
	    <input class="pass" type="password" name="password" align="center" placeholder="Password" id="password"><br>
	    <input type="checkbox" name="checkbox" id="checkbox"> Show Password
	    <button class="submit" name="submit" type="submit" align="center">Sign In</button>
	    <p class="or" align="center">Or Sign In with</p>
	    <button class="google" align="center">Google Account</button>
	    <p class="create" align="center">
		<ins><a href="regist.php">Create Account</a></ins>	
	    </p>
	</form>
    </div>

</body>


</html>