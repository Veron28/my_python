<?php
	session_start();
	$host = "localhost";
	$user = "u957998843_admin";
	$pass = ";STAnoxa=y6";
	$name = "u957998843_veron";
	$connection = mysqli_connect($host, $user, $pass, $name) or die(mysqli_error($connection));
	if (isset($_POST["submit"])) {
		$_SESSION["mistake"] = 0;	
		if (empty($_POST["login"]))	
			$_SESSION["mistake"] = 1;
		elseif (empty($_POST["password"]))	
			$_SESSION["mistake"] = 2;
		else {
			$login = mysqli_real_escape_string($connection, $_POST["login"]);
			$password = mysqli_real_escape_string($connection, $_POST["password"]);
			$query = "SELECT num, account, name, last_name FROM users WHERE login='$login' AND password='$password'";
			$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
			if (!mysqli_num_rows($sql))
				$_SESSION["mistake"] = 3;
			else {
				$data = mysqli_fetch_row($sql);
				$_SESSION["num"] = $data[0];
				$_SESSION["account"] = $data[1];
				$_SESSION["name"] = $data[2];
				$_SESSION["last_name"] = $data[3];
				mysqli_free_result($sql);
				mysqli_close($connection);
				echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>";
			}
		}
		if ($_SESSION["mistake"] != 0)
			echo "<meta http-equiv='Refresh' content='0; URL=../auth.php'>";
	}
	else
		echo "<meta http-equiv='Refresh' content='0; URL=../auth.php'>";
?>