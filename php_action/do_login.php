<?php

session_start();

if(isset($_POST['loginBtn'])) {

	$username = $_POST['usernameLogin'];
	$password = $_POST['passwordLogin'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			echo '<script>alert ("Username dibutuhkan")</script>';
		}

		if($password == "") {
			echo '<script>alert ("Password dibutuhkan")</script>';
		}
	}
	else {
		$sql = "SELECT * FROM masyarakat WHERE username = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			// exists
			$mainSql = "SELECT * FROM masyarakat WHERE username = '$username' AND password = MD5('$password')";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$nama = $value['nama'];
				$nik = $value['nik'];
				$username = $value['username'];

				// set session
				$_SESSION['nik'] = $nik;
				$_SESSION['nama'] = $nama;
				$_SESSION['username'] = $username;
				
				header('location: ../pm1/index.php');
			}
			else{
				echo '<script>alert ("Username/Password salah")</script>';
			} // /else
		}
		else {
			echo '<script>alert ("Username belum terdaftar, mohon untuk mendaftar")</script>';
		} // /else
	} // /else not empty username // password

}
?>
