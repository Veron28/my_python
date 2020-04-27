<?php include("header.php"); ?>
<link rel='stylesheet' href='css/roulette.css' type='text/css' charset='uft-8'>
<?php include("header2.php"); ?>

<?php
	$prize = "Для участия необходима 1 🍬";
	if (isset($num)) {
		$query = "SELECT is_play FROM users WHERE num='$num'";
		$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
		if (mysqli_fetch_row($sql)[0]) {
			$prize = "У вас есть бесплатная прокрутка";
			$_SESSION["is_play"] = 1;
		}
	}
	$prizes = array("Вы проиграли",
	                "Вы выиграли 10 🍬",
	                "Вы выиграли возможность получить бесплатное решение задачи",
	                "Вы выиграли возможность бесплатно поучавствовать в лотерее",
	                "Вы выиграли 5 🍬",
	                "Вы выиграли 3 🍬",
	                "Вы выиграли бесплатную прокрутку",
	                "Вы выиграли 2 🍬");
	$left_prizes = array("<img class='img_prize' src='img/prizes/10.png'>",
	                "<img class='img_prize' src='img/prizes/hw.png'>",
	                "<img class='img_prize' src='img/prizes/l.png'>",
	                "<img class='img_prize' src='img/prizes/5.png'>",
	                "<img class='img_prize' src='img/prizes/3.png'>",
	                "<img class='img_prize' src='img/prizes/r.png'>",
	                "<img class='img_prize' src='img/prizes/2.png'>");
	if (isset($_SESSION["prize"]))
		$prize = $prizes[$_SESSION["prize"]];
	$deg = 360 * rand(2, 5) + $_SESSION["prize"] * 45 + rand(1, 44);
	$winners = array();
	for ($i = 0; $i < 5; $i++) {
		if (!isset($connection)) {
			$host = "localhost";
			$user = "u957998843_admin";
			$pass = ";STAnoxa=y6";
			$name = "u957998843_veron";
			$connection = mysqli_connect($host, $user, $pass, $name) or die(mysqli_error($connection));
		}
		$query = "SELECT ind, num FROM prizes WHERE position='$i'";
		$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
		$r = mysqli_fetch_row($sql);
		$index = $r[0];
		$_num = $r[1];
		$query = "SELECT name, last_name FROM users WHERE num='$_num'";
		$array = mysqli_query($connection, $query) or die(mysqli_error($connection)); 
		$array = mysqli_fetch_row($array);
		$name = stripslashes($array[0]);
		$name = htmlspecialchars($name);
		$last_name = stripslashes($array[1]);
		$last_name = htmlspecialchars($last_name);
		$left_prize = $left_prizes[$index - 1];
		$winers[$i] = array($name, $last_name, $left_prize);
	}
	$last = "<img class='img_prize' src='img/prizes/dash.png'>";
	$all = 0; 
	$hw = 0;
	$max = 0;
	$l = 0;
	if (isset($num)) {
		$query = "SELECT mx, al, l, hw, last FROM users WHERE num='$num'";
		$array = mysqli_query($connection, $query) or die(mysqli_error($connection));
		$array = mysqli_fetch_row($array);
		$max = $array[0];
		$all = $array[1];
		$l = $array[2];
		$hw = $array[3];
		if (isset($left_prizes[$array[4] - 1]))
			$last = $left_prizes[$array[4] - 1];
	}
?>

<span class='main_text'>Рулетка</span>
<div class='body'>
	<div class='prize_list'>
		<span class='prize_text'>Последние выигрыши</span>
		<div>
			<?php
				foreach ($winers as $winner) {
					$name = $winner[0];
					$last_name = $winner[1];
					$left_prize = $winner[2];
					echo "
					<div class='winner'>
						<span class='winner_text'>{$name} {$last_name}: </span>{$left_prize}
					</div>";
				}
			?>
		</div>
	</div>
	<div>
		<span class='text'><?php echo $prize; ?></span>
		<form method='post' action='verification/ver_roulette.php'>
			<input class='roll' name='submit' type='submit' value='Крутить'>
		</form>
		<img class='wheel' src='img/wheel.png'>
		<img class='arrow' src='img/arrow.png'>
	</div>
	<div class='state_list'>
		<span class='prize_text'>Статистика</span>
		<div>
			<?php
				echo "
				<div class='winner1'>
					<span class='winner_text'>Последний выигрыш: {$last_win}</span><div class='imgt'>{$last}</div>
				</div>
				<div class='winner1'>
					<span class='winner_text'>Выиграно всего:  {$all} 🍬</span>
				</div>
				<div class='winner1'>
					<span class='winner_text'>Максимальный выигрыш:  {$max} 🍬</span>
				</div>
				<div class='winner1'>
					<span class='winner_text'>Выиграно домашних работ:  {$hw}</span>
				</div>
				<div class='winner1'>
					<span class='winner_text'>Выиграно бесплатных лотерей:  {$l}</span>
				</div>";
			?>
		</div>
	</div>
</div>
<style type='text/css'>
	.text {
		margin-top: 75px;
		text-align: center;
		display: block;
		font-size: 1.25em;
		animation-name: vis;
		animation-duration: 5s;
		animation-timing-function: cubic-bezier(.9, .03, 1, -0.2);
	}

	.arrow {
		
		animation-name: rot;
		animation-duration: 5s;
		animation-timing-function: cubic-bezier(.17,.84,.44,1);
		transform: rotate(<?php echo "{$deg}deg"; ?>);
	}

	<?php
		if (isset($_SESSION["prize"])) {
			echo 
				"@keyframes rot {
					0% {transform: rotate(0deg);}
					100% {transform: rotate({$deg}deg);}
				}

				@keyframes vis {
					0% {opacity: 0;}
					100% {opacity: 1;}
				}";
		}
		unset($_SESSION["prize"]);
	?>
</style>

<?php include("footer.php"); ?>