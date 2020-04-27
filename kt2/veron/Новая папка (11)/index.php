<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Beer Mile (Великие Луки) - Официальный сайт</title>
	<link rel='stylesheet' href='css/index.css' type='text/css' charset='uft-8'>
	<link rel='stylesheet' href='css/main.css' type='text/css' charset='uft-8'>
	<link rel='stylesheet' href='css/font-awesome.min.css' type='text/css' charser='utf-8'>
	<link href="https://fonts.googleapis.com/css?family=Comfortaa+Sans" rel="stylesheet">  
	<meta name='viewport' content='wclassth=device-wclassth, initial-scale=1'>
	<link rel='shortcut icon' href='img/shortcut_icon.ico' type='image/x-icon'>
	<script type='text/javascript'>
		timeend = new Date(2019, 4, 11, 15, 0, 0);
		function Timer() {
			today = new Date();
			today = Math.floor((timeend - today) / 1000); 
			tsec = today % 60;
 			today = Math.floor(today / 60);
 			tmin = today % 60;
 			today = Math.floor(today / 60);
 			thour = today % 24; 
			today = Math.floor(today / 24);
			if (today <= 0 && thour <= 0 && tmin <= 0 && tsec < 0) {
				result = "Пивная миля началась";
				document.getElementById("days1").innerHTML = result;
				document.getElementById("main_title").innerHTML = "";
				document.getElementById("text").innerHTML = "";
			}
			else {
 			if (tsec < 10)
 				tsec = '0' + tsec;
 			if (tmin < 10)
 				tmin = '0' + tmin;
			if (thour < 10)
 				thour = '0' + thour;
 			if (today < 10)
 				today = '0' + today;
 			if (today < 100)
 				today = '0' + today;
 			result = today + " : " + thour + " : " + tmin + " : " + tsec;
    		document.getElementById("days1").innerHTML = result;
    		}
			window.setTimeout("Timer()", 1000);
		}
	</script>
	<body onload='Timer()'>
	</script>
</head>
<body bgcolor='#000' background='img/bg.png'>
	<div class='main'>
		<div class='title'>
			<span id='main_title'>До пивной мили осталось:</span>
		</div>
		<div class='time1'>
			<span id='days1'></span>		
		</div>
		<div class='time2'>
			<pre id='text'>      дней                         часов                     минут                 секунд</pre>	
		</div>
		
	</div>
	</body>
</html>