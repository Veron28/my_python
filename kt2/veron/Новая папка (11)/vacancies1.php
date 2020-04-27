<?php  include("header.php"); ?>
<link rel='stylesheet' href='css/vacancies1.css' type='text/css' charset='uft-8'>
<?php include("header2.php"); ?>

<span class='main_text'>Вакансии</span>
<div class='articles'>
	<div class='article'>
		<div class='picture'>
			<img src='img/vacancies/programmer.jpg'>
		</div>
		<span>Специалист по КуМиру</span>
		<h4>5- 8🍬</h4>
		<div class='description'>
			Если Вы ответственный, программист, который хорошо знает КуМир, умеет решать задачи любой сложности и хочет зарабатывать килограммы вкуснейших конфет, то Вам точно стоит подумать о том, чтобы начать работать в Вероне.
		</div>
		<a href='programmer.php'>Откликнуться</a>
	</div>
	<div class='article'>
		<div class='picture'>
			<img src='img/vacancies/marketer.jpg'>
		</div>
		<span>Маркетолог</span>
		<h4>4-6 🍬</h4>
		<div class='description'>
			Мы ищем опытного специалиста, умеющего решать задачи различной сложности. Специалист в нашей команде должен быть заинтересован в личном росте и заработке конфет, правильно распределять свое время и стремиться стать лучшим в своей сфере.
		</div>
		<a href='marketer.php'>Откликнуться</a>
	</div>
	<div class='article'>
		<div class='picture'>
			<img src='img/vacancies/guard.jpg'>
		</div>
		<span>Охранник</span>
		<h4>2-4 🍬</h4>
		<div class='description'>
			Если Вы сильный, бесстрашный школьник, который хочет приносить пользу обществу, то эта работа для Вас. В Вероне Вы не только наберетесь большого опыта по Питону и КуМиру, но и по Кунг Фу, Карате и стрельбе с двух рук.
		</div>
		<a href='guard.php'>Откликнуться</a>
	</div>
</div>
<div class='pages'>
	<a class='page_btn1'><?php echo htmlspecialchars("<"); ?></a>
	<a class='page_btn'>1</a>
	<a class='page_btn1'><?php echo htmlspecialchars(">"); ?></a>
</div>

<?php include("footer.php"); ?>