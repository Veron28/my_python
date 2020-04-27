<?php  include("header.php"); ?>
<link rel='stylesheet' href='css/tasks.css' type='text/css' charset='uft-8'>
<?php include("header2.php"); ?>

<div class='form'>
<form action='credit_confirm.php' method='post' class='data'>
	<?php
	if (isset($_SESSION["mistake"]) && $_SESSION["mistake"]) {
		$mistake = "Некорректная сумма кредита";
		if ($_SESSION["mistake"] == 2)
				$mistake = "Слишком большая сумма кредита";
		unset($_SESSION["mistake"]);
		echo "<div class='mistake'>
				$mistake
			</div>";
	}
	else
		echo "<div class='nomistake'></div>";
?>
	<div class='name'>
		<input name='credit' type='text'>
		<span>Сумма кредита</span>
	</div>
	<div class='submit'>
		<input name='submit' type='submit' value='Получить'>
	</div>
</form>
</div>

<?php include("footer.php"); ?>