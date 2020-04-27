<?php include("header.php"); ?>
<link rel='stylesheet' href='css/reg.css' type='text/css' charset='uft-8'>
<?php include("header2.php"); ?>

<div class='form'>
<form action='verification/ver_changep.php' method='post' class='data'>
	<?php
	if ($r == 4)
		echo "<meta http-equiv='Refresh' content='0; URL=default.php'>";
	$mistakes = array("Введите логин",
					  "",
	                  "Введите пароль",
	                  "Слишком длинное имя",
	                  "Пароли не совпадают",
	                  "Введите имя",
	                  "Введите фамилию",
	                  "Слишком длинная фамилия",
	                  "Введите номер класса",
	                  "Некоректный номер класса",
	                  "Введите букву класса",
	                  "Логин уже занят",
	                  "Неверный старый пароль");
	if (isset($_SESSION["mistake"]) && $_SESSION["mistake"]) {
		$mistake = $mistakes[$_SESSION["mistake"] - 1];
		echo "<div class='mistake'>
				$mistake
			</div>";
	}
	else
		echo "<div class='nomistake'></div>";
	$_SESSION["mistake"] = 0;
?>
	<div class='password'>
		<input name='password1' type='password'>
		<span>Старый пароль</span>
	</div>
	<div class='password'>
		<input name='password' type='password'>
		<span>Пароль</span>
	</div>
	<div class='password2'>
		<input name='password2' type='password'>
		<span>Повторите пароль</span>
	</div>
	<div class='submit'>
		<input name='submit' type='submit' value='Зарегистрироваться'>
	</div>
</form>
</div>
<?php include("footer.php"); ?>
