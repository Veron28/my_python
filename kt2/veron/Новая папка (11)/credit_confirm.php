<?php include("header.php"); ?>
<link rel='stylesheet' href='css/success.css' type='text/css' charset='uft-8'>
<?php include("header2.php"); ?>
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
			$query = "SELECT credit FROM users WHERE num='$num'";
			$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
			$credit = mysqli_fetch_row($sql)[0];
			$_SESSION["mistake"] = 0; 
			if (!preg_match("/^\d+$/", $_POST["credit"]) or empty($_POST["credit"]) or ((int)$_POST["credit"]  + $credit > 6)) {
				$_SESSION["mistake"] = 1;
				if ((int)$_POST["credit"] + $credit > 6)
					$_SESSION["mistake"] = 2;
				echo "<meta http-equiv='Refresh' content='0; URL=../credit.php'>";
			}
			$_SESSION["credit"] = $_POST["credit"];
		}
		else
			echo "<meta http-equiv='Refresh' content='0; URL=../auth.php'>";
	}
	else
		echo "<meta http-equiv='Refresh' content='0; URL=../default.php'>";
?>
<div class='aa'>
<span class='success'>Долг составит: <?php echo $_POST["credit"];?> 🍬</span>
<a href='verification/ver_credit.php'>
	<div class='button'>
		Получить
	</div>
</a>
</div>
<?php include("footer.php"); ?>