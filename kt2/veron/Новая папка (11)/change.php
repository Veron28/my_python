<?php include("header.php"); ?>
<link rel='stylesheet' href='css/reg.css' type='text/css' charset='uft-8'>
<?php include("header2.php"); ?>

<div class='form'>
<form action='verification/ver_change.php' method='post' class='data'>
	<?php
	if ($r != 4)
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
	                  "Логин уже занят");
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
	<div class='name'>
		<input name='name' type='text'>
		<span>Имя</span>
	</div>
	<div class='last_name'>
		<input name='last_name' type='text'>
		<span>Фамилия</span>
	</div>
	<div>
		<input name='vk' type='text' placeholder=" Необязательно">
		<span>Ссылка на страницу ВК</span>
	</div>
	<div class='login'>
		<input name='login' type='text'>
		<span>Логин</span>
	</div>
	<div class='classNL'>
		<input maxLength=2 class='first' name='class_l' type='text'>
		<input name='class_n' type='text' maxLength=2>
		<span>Класс</span>
	</div>
	<div class='submit'>
		<input name='submit' type='submit' value='Редактировать'>
	</div>
</form>
</div>
<?php include("footer.php"); ?>
