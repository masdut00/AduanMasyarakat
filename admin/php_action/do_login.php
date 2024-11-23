<?php
$errors = array();
session_start();
if(isset($_POST['login'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username di butuhkan";
		}

		if($password == "") {
			$errors[] = "Password di butuhkan";
		}
	}
	else {
		$sql = "SELECT * FROM petugas WHERE username = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			// exists
			$mainSql = "SELECT * FROM petugas WHERE username = '$username' AND password = MD5('$password')";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user = $value['nama_petugas'];
				$id = $value['id_petugas'];
				$username = $value['username'];
				$level = $value['level'];

				// set session
				$_SESSION['id_petugas'] = $id;
				$_SESSION['nama_petugas'] = $user;
				$_SESSION['username'] = $username;
				$_SESSION['level'] = $level;
				header('location: dashboard.php');

			}
			else{
				$errors[] = "Username/ password salah";
			} // /else
		}
		else {
			$errors[] = "Username belum terdaftar, silahkan daftar";
		} // /else
	} // /else not empty username // password

} // /if $_POST
?>
