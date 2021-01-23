<?php
	session_start();
	echo '<br>';
	echo session_id();
	echo '<br>';
	print_r($_SESSION);
?>