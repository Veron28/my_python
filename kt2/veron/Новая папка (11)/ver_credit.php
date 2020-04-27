<?php
		session_start();
		$r = 0;
		if (isset($_SESSION["num"])) 
			++$r;
		if (isset($_SESSION["name"]))
			++$r;
		if (isset($_SESSION["last_name"])) 
			++$r;
		if ($r == 3) {
			$host = "localhost";
			$user = "u957998843_admin";
			$pass = ";STAnoxa=y6";
			$name = "u957998843_veron";
			$connection = mysqli_connect($host, $user, $pass, $name) or die(mysqli_error($connection));
			$num = $_SESSION["num"];
			$query = "SELECT account FROM users WHERE num='$num'";
			$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
			if (!mysqli_num_rows($sql))
				die("Error while reading account data");
			$account = mysqli_fetch_row($sql)[0];
			mysqli_free_result($sql);
			$credit = $_SESSION["credit"];
			unset($_SESSION["credit"]);
			$query = "UPDATE users SET credit=credit+'$credit' WHERE num='$num'";
			mysqli_query($connection, $query) or die(mysqli_error($connection));
			$query = "UPDATE users SET account=account+'$credit' WHERE num='$num'";
			mysqli_query($connection, $query) or die(mysqli_error($connection));
			echo "<meta http-equiv='Refresh' content='0; URL=../default.php'>";
			mysqli_close($connection);
		}
		else
			echo "<meta http-equiv='Refresh' content='0; URL=../auth.php'>";
?>