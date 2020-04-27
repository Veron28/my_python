<?php
	if (isset($_POST["submit"])) {
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
			if ($account >= 1) {
				$s = rand(1, 5);
				$s1 = rand(1, 8);
				$s2 = rand(1, 20);
				$s3 = rand(1, 100);
				$s4 = rand(1, 10);
				$s5 = rand(1, 40);
				$s6 = rand(1, 100);
				$prize = -1;
				if (isset($_SESSION["is_play"])) {
					$prize = 0;
					unset($_SESSION["is_play"]);
					$query = "UPDATE users SET is_play=0 WHERE num='$num'";
					mysqli_query($connection, $query) or die(mysqli_error($connection)); 
				}
				$index = 0;
				if ($s == 1) {
					$prize += 2;
					$index = 7;
				}
				elseif ($s1 == 1) {
					$prize += 3;
					$index = 5;
				}
				elseif ($s2 == 1) {
					$index = 4;
					$prize += 5;
				}
				elseif ($s3 == 1) {
					$index = 1;
					$prize += 10;
				}
				elseif ($s4 == 1) {
					$query = "UPDATE users SET is_play=1 WHERE num='$num'";
					mysqli_query($connection, $query) or die(mysqli_error($connection)); 
					$index = 6;
				}
				elseif ($s5 == 1) 
					$index = 3;
				elseif ($s6 == 1) 
					$index = 2;
				if ($index) {
					if ($index == 2) {
						$query = "UPDATE users SET hw=hw+1 WHERE num='$num'";
						mysqli_query($connection, $query) or die(mysqli_error($connection));
					}
					if ($index == 3) {
						$query = "UPDATE users SET l=l+1 WHERE num='$num'";
						mysqli_query($connection, $query) or die(mysqli_error($connection));
					}
					++$prize;
					if ($prize) {
						$query = "SELECT al FROM users WHERE num='$num'";
						$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
						$all = mysqli_fetch_row($sql)[0];
						$all += $prize;
						$query = "UPDATE users SET al='$all' WHERE num='$num'";
						mysqli_query($connection, $query) or die(mysqli_error($connection));
					}
					$query = "SELECT mx FROM users WHERE num='$num'";
					$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
					$max = mysqli_fetch_row($sql)[0];
					$max = max($max, $prize);
					$query = "UPDATE users SET mx='$max' WHERE num='$num'";
					mysqli_query($connection, $query) or die(mysqli_error($connection));
					$query = "UPDATE users SET last='$index' WHERE num='$num'";
					mysqli_query($connection, $query) or die(mysqli_error($connection));
					$query = "DELETE FROM prizes WHERE position=4";
					mysqli_query($connection, $query) or die(mysqli_error($connection));
					$query = "UPDATE prizes SET position=position+1";
					mysqli_query($connection, $query) or die(mysqli_error($connection));
					$num = $_SESSION["num"];
					$query = "INSERT INTO prizes (num, ind, position) VALUES('$num', '$index', 0)";
					mysqli_query($connection, $query) or die(mysqli_error($connection));
					--$prize;
				}
				$account += $prize;
				$_SESSION["prize"] = $index;
				$query = "UPDATE users SET account='$account' WHERE num='$num'";
				mysqli_query($connection, $query) or die(mysqli_error($connection)); 
				echo "<meta http-equiv='Refresh' content='0; URL=../roulette.php'>";
			}
			else
				echo "<meta http-equiv='Refresh' content='0; URL=../balance.php'>";
			mysqli_close($connection);
		}
		else
			echo "<meta http-equiv='Refresh' content='0; URL=../auth.php'>";
	}
	else
		echo "<meta http-equiv='Refresh' content='0; URL=../default.php'>";
?>