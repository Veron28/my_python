<?php
	session_start();
	unset($_SESSION["num"]);
	unset($_SESSION["name"]);
	unset($_SESSION["last_name"]);
	echo "<meta http-equiv='Refresh' content='0; URL=default.php'>";
?>