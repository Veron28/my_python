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
			$_SESSION["mistake"] = 0; 
			if (!preg_match("/^\d+$/", $_POST["count"]) or empty($_POST["count"])) {
				$_SESSION["mistake"] = 1;
				echo "<meta http-equiv='Refresh' content='0; URL=../tasks.php'>";
			}
			$price = 3;
			if (!strcmp($_POST["decision"], 'on'))
				++$price;
			$price *= (int)$_POST["count"];
			$_SESSION["price"] = $price;
			$_SESSION["count"] = $_POST["count"];
			$_SESSION["text"] = $_POST["text"];
			$_SESSION["vk"] = $_POST["vk"];
			$_SESSION["decision"] = $_POST["decision"];
		}
		else
			echo "<meta http-equiv='Refresh' content='0; URL=../auth.php'>";
	}
	else
		echo "<meta http-equiv='Refresh' content='0; URL=../default.php'>";
?>
<div class='aa'>
<span class='success'>Цена заказа: <?php echo $price;?> 🍬</span>
<a href='verification/ver_tasks.php'>
	<div class='button'>
		Приобрести
	</div>
</a>
</div>
<?php include("footer.php"); ?>