<?php  include("header.php"); ?>
<link rel='stylesheet' href='css/profile.css' type='text/css' charset='uft-8'>
<?php include("header2.php"); ?>
<?php
	if ($r == 4) {
		$host = "localhost";
		$user = "u957998843_admin";
		$pass = ";STAnoxa=y6";
		$name = "u957998843_veron";
		$connection = mysqli_connect($host, $user, $pass, $name) or die(mysqli_error($connection));
		$num = $_SESSION["num"];
		$query = "SELECT account, credit, vk, hw, l, in_lottery, is_play, name, last_name, class_n, class_l FROM users WHERE num='$num'";
		$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
		if (!mysqli_num_rows($sql))
			die("Error while reading account data");
		$a = mysqli_fetch_row($sql);
		$account = $a[0];
		$credit = $a[1];
		$vk = $a[2];
		if (!$vk)
			$vk = "-";
		$hw = $a[3];
		if (!$hw)
			$hw = "нет";
		else
			$hw = "есть";
		$l = $a[4];
		if (!$l)
			$l = "нет";
		else
			$l = "есть";
		$in_lottery = $a[5];
		if (!$in_lottery)
			$in_lottery = "не";
		else
			$in_lottery = "есть";
		$is_play = $a[6];
		if (!$is_play)
			$is_play = "нет бесплатной прокрутки";
		else
			$is_play = "есть бесплатная прокрутка";
		$name = $a[7];
		$last_name = $a[8];
		$class_n = $a[9];
		$class_l = $a[10];
		mysqli_free_result($sql);
		++$r;
	}
	else
		echo "<meta http-equiv='Refresh' content='0; URL=default.php'>";
?>
<span class='main_text'>Профиль</span>
<div class='articles'>
	<div class='article'>
		<span>Основная информация</span>
		<hr>
		<div class='description'>
			<span>Баланс: <?php echo $account; ?> 🍬</span>
			<span>Долг: <?php echo $credit; ?> 🍬</span>
			<span>ID: <?php echo $num; ?></span>
			<span>Вы сейчас <?php echo $in_lottery; ?> учавствуете в лотерее</span>
			<span>У вас <?php echo $is_play; ?></span>
			<span>У вас <?php echo $l; ?> возможность бесплатно поучавствовать в лотерее</span>
			<span>У вас <?php echo $hw; ?> возможность получить бесплатное решение задачи</span>
		</div>
		<hr>
		<div class='description'>
			<span>Имя: <?php echo $name; ?></span>
			<span>Фамилия: <?php echo $last_name; ?></span>
			<span>Ссылка на страницу в ВК: <?php echo $vk; ?></span>
			<span>Класс: <?php echo $class_n; echo " "; echo $class_l; ?></span>
		</div>
		<div class='btns'>
			<a class='bt' href='change.php'>Редактировать</a>
			<a class='bt' href='programmer.php'>Сменить пароль</a>
		</div>
	</div>
	<div class='article'>
		<span>Заказы</span>
		<hr>
		<?php
			$s = array();
			for ($i = 0; $i < 3; $i++) {
				$query = "SELECT decision, ready, message FROM requests WHERE user='$num'";
				$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
				$a = mysqli_fetch_row($sql);
				if (empty($a)) {
					$s[$i][0] = '';
					$s[$i][1] = '';
					$s[$i][2] = '';
					continue;
				}
				$ready = $a[1];
				$decision = $a[0];
				$text = $a[2];
				if (!strcmp($decision, 'on')) {
					$s[$i][0] = 'Задачи по информатике';
					$s[$i][1] = 'Индивидуальное решение';
				}
				elseif (!strcmp($decision, '0')) {
					$s[$i][0] = "Объяснение задач";
					$s[$i][1] = '-';
				}
				else {
					$s[$i][0] = 'Задачи по информатике';
					$s[$i][1] = '-';
				}
				if ($ready == 0) 
					$s[$i][2] = 'В очереди';
				else
					$s[$i][2] = 'Решено';
				$query = "UPDATE requests SET user=-user WHERE user='$num' AND message='$text'";
				$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
			}
				$query = "UPDATE requests SET user=-user WHERE user='-$num'";
				$sql = mysqli_query($connection, $query) or die(mysqli_error($connection));
				echo "<div><div>
			<span>{$s[0][0]}</span>
			<span>{$s[0][1]}</span>
			<span>{$s[0][2]}</span>
			</div>
			<div "; if (!$s[0][0]) echo "style='visibility:hidden' "; echo "class='check'>
			<a class='bt' href='programmer.php'>Посмотреть</a>
			</div>
		</div>"; if ($s[0][0]) echo "<hr class='aaa'>";
		echo "<div><div>
			<span>{$s[1][0]}</span>
			<span>{$s[1][1]}</span>
			<span>{$s[1][2]}</span>
			</div>
			<div "; if (!$s[1][0]) echo "style='visibility: hidden' "; echo "class='check'>
			<a class='bt' href='programmer.php'>Посмотреть</a>
			</div>
		</div>"; if ($s[1][0]) echo "<hr class='aaa'>";
		echo "<div><div>
			<span>{$s[2][0]}</span>
			<span>{$s[2][1]}</span>
			<span>{$s[2][2]}</span>
			</div>
			<div class='check'>
			<a "; if (!$s[2][0]) echo "style='visibility: hidden' "; echo "class='bt' href='programmer.php'>Посмотреть</a>
			</div>
		</div>";
		?>
	</div>
</div>

<?php include("footer.php"); ?>