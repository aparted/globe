<?php
	if (isset($_GET["lang"])) {
		include_once "en.php";
	}else
	{
		include_once "true_index.php";
	}
?>