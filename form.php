<!DOCTYPE html>
<html>
<head>
	<title> Form | KRAKEN</title>
</head>
<body>
	<form action="" method="POST">
		<fieldset>
			<legend> Halaman Login </legend>
			<p>
				<label> USERNAME </label>
				<input type="text" name="username">
				<label> Password</label>
				<input type="password" name="password">
				<input type="submit" name="submit" value="Login">
			</p>
		</fieldset>
		<?php 
			if (isset($_POST['submit'])) {
				session_start();
				include 'kraken.php';
			 	$user = $_POST['username'];
			 	$pass = $_POST['password'];
			 	$cek = mysqli_query($kondisi,"SELECT * from user WHERE nama = '".$user."' AND password = '" .$pass."'");
			 	if(mysqli_num_rows($cek) > 0){
			 		$d = mysqli_fetch_object($cek);
			 		$_SESSION['status_login']= true;
			 		$_SESSION['a_global'] = $d;
			 		$_SESSION['id'] = $d ->admin_id;
			 		//echo '<script>window.location="adminpage.php"</script>';
			 		echo '<script>alert("Login Berhasil!")</script>';
			 	}
			 	else{
			 		echo '<script>alert("username atau password anda salah!")</script>';
			 	}
			 } 
		?>
	</form>
</body>
</html>