<?php  include("header.php"); ?>
<link rel='stylesheet' href='css/tasks.css' type='text/css' charset='uft-8'>
<?php include("header2.php"); ?>

<div class='form'>
<form action='explanation_confirm.php' method='post' class='data'>
	<?php
	if (isset($_SESSION["mistake"]) && $_SESSION["mistake"]) {
		unset($_SESSION["mistake"]);
		$mistake = "Некорректное количество задач";
		echo "<div class='mistake'>
				$mistake
			</div>";
	}
	else
		echo "<div class='nomistake'></div>";
?>
	<div class='name'>
		<input name='count' type='text'>
		<span>Количество задач</span>
	</div>
	<div class='last_name'>
		<input name='vk' type='checkbox'>
		<span>Получить объяснение в ВК</span>
	</div>
	<div class='password2'>
		<textarea name='text' cols='40' rows='5'></textarea>
		<span class='spec'>Что нужно объяснить</span>
	</div>
	<div class='submit'>
		<input name='submit' type='submit' value='Узнать цену'>
	</div>
</form>
</div>

<?php include("footer.php"); ?>