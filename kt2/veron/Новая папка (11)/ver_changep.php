<?php
	session_start();
	$host = "localhost";
	$user = "u957998843_admin";
	$pass = ";STAnoxa=y6";
	$name = "u957998843_veron";
	$connection = mysqli_connect($host, $user, $pass, $name) or die(mysqli_error($connection));
	if (isset($_POST["submit"])) {
		$_SESSION["mistake"] = 0;	
		if (empty($_POST["password"]))	
			$_SESSION["mistake"] = 3;
		elseif ($_POST["password"] != $_POST["password2"])	
			$_SESSION["mistake"] = 5;
		if ($_SESSION["mistake"])
			echo "<meta http-equiv='Refresh' content='0; URL=../changep.php'>";
		else {
			$query = "SELECT password FROM users WHERE num=$num";
			$account = mysqli_fetch_row($sql)[0];
			if ($account != $_SESSION["password1"]) {
				$_SESSION["mistake"] = 12;
				echo "<meta http-equiv='Refresh' content='0; URL=../changep.php'>";
			}
			$login = mysqli_real_escape_string($connection, $_POST["login"]);
			$password = mysqli_real_escape_string($connection, $_POST["password"]);
			$name = mysqli_real_escape_string($connection, $_POST["name"]);
			$last_name = mysqli_real_escape_string($connection, $_POST["last_name"]);
			$class_n = mysqli_real_escape_string($connection, $_POST["class_n"]);
			$class_l = mysqli_real_escape_string($connection, $_POST["class_l"]);
			$ndate = date("d-m-Y H:i");
			$vk = mysqli_real_escape_string($connection, $_POST["vk"]);
			$query = "UPDATE users SET password='$password' WHERE num=$num";
			mysqli_query($connection, $query) or die(mysqli_error($connection));
			mysqli_close($connection);
			echo "<meta http-equiv='Refresh' content='0; URL=../profile.php'>";
		}
	}
	else
		echo "<meta http-equiv='Refresh' content='0; URL=../changep.php'>";
?>