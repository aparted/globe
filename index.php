<?php
	if (isset($_GET["lang"])) {
		include_once "en.php";
	}elseif (isset($_GET["location"])) {
		include_once "globe.php";
	}else
	{
		include_once "true_index.php";
	}
?>