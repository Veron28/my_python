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
			$_SESSION["mistake"] = 3;
		elseif ($_POST["password"] != $_POST["password2"])	
			$_SESSION["mistake"] = 5;
		elseif (empty($_POST["name"]))
			$_SESSION["mistake"] = 6;
		elseif (empty($_POST["last_name"]))
			$_SESSION["mistake"] = 7;
		elseif (isset($_POST["name"][16]))
			$_SESSION["mistake"] = 4;
		elseif (isset($_POST["last_name"][16]))
			$_SESSION["mistake"] = 8;
		elseif (empty($_POST["class_n"]))	
			$_SESSION["mistake"] = 9;
		elseif (!preg_match("/^\d+$/", $_POST['class_n']))
			$_SESSION["mistake"] = 10;
		elseif (empty($_POST["class_l"]))	
			$_SESSION["mistake"] = 11;
		else {
			$login = $_POST["login"];
			$query = "SELECT num FROM users WHERE login='$login'";
			$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
			if (mysqli_num_rows($sql))
				$_SESSION["mistake"] = 12;
		}
		if ($_SESSION["mistake"])
			echo "<meta http-equiv='Refresh' content='0; URL=../reg.php'>";
		else {
			$login = mysqli_real_escape_string($connection, $_POST["login"]);
			$password = mysqli_real_escape_string($connection, $_POST["password"]);
			$name = mysqli_real_escape_string($connection, $_POST["name"]);
			$last_name = mysqli_real_escape_string($connection, $_POST["last_name"]);
			$class_n = mysqli_real_escape_string($connection, $_POST["class_n"]);
			$class_l = mysqli_real_escape_string($connection, $_POST["class_l"]);
			$ndate = date("d-m-Y H:i");
			$vk = mysqli_real_escape_string($connection, $_POST["vk"]);
			$account = 0;
			while (true) {
				$num = rand(1, 999);
				$query = "SELECT id FROM users WHERE num='$num'";
				$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
				if (!mysqli_num_rows($sql)) {
					mysqli_free_result($sql);
					break;
				}
			}
			$query = "INSERT INTO users (num, login, password, name, last_name, ndate, account, class_n, class_l, vk) 
			VALUES($num, '$login', '$password', '$name', '$last_name', '$ndate', $account, $class_n, '$class_l', '$vk')";
			mysqli_query($connection, $query) or die(mysqli_error($connection));
			mysqli_close($connection);
			echo "<meta http-equiv='Refresh' content='0; URL=../success.php'>";
		}
	}
	else
		echo "<meta http-equiv='Refresh' content='0; URL=../reg.php'>";
?>