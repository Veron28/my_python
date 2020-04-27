<link rel='stylesheet' href='css/main.css' type='text/css' charset='uft-8'>
<link rel='stylesheet' href='css/font-awesome.min.css' type='text/css' charser='utf-8'>
<meta name='keywords' content='candies'>
<meta name='viewport' content='wclassth=device-wclassth, initial-scale=1'>
<link rel='shortcut icon' href='img/shortcut_icon.ico' type='image/x-icon'>
</head>
<body>
	<div class='wrapper'>
		<div class='content'>
			<header>
				<div id='menu_show'><i class="fa fa-bars" aria-hidden="true"></i></div>
				<div class='logo'>
					<a href='default.php'>
						<img src='img/logo.png'>
					</a>
				</div>
				<div class='menu'>
					<a href='roulette.php'>Рулетка</a>
					<a href='lottery.php'>Лотерея</a>
					<a href='service.php'>Услуги</a>
					<a href='vacancies1.php'>Вакансии</a>
				</div>
			</header>
			<div id='mobile_menu'>
					<div class='fir' ><a href='roulette.php'>Рулетка</a></div>
					<div><a href='lottery.php'>Лотерея</a></div>
					<div><a href='service.php'>Услуги</a></div>
					<div><a href='vacancies1.php'>Вакансии</a></div>
					<?php if ($r == 4) echo "<div><a href='profile.php'>Профиль</a></div>"; ?>
				</div>
			<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
			<script>
				$('#menu_show').click (function() {
					if ($('#mobile_menu').is(':visible'))
						$('#mobile_menu').hide ();
					else
						$('#mobile_menu').show ();
				});
			</script>