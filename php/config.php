<?php 

	if (!isset($_SESSION['lang']))
		$_SESSION['lang'] = "en";  
	
	else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
		if ($_GET['lang'] == "en")
			$_SESSION['lang'] = "en";
		else if ($_GET['lang'] == "ch")
			$_SESSION['lang'] = "ch";
	} 
	$fileparts = explode('/',$_SERVER['REQUEST_URI']); 
	$filename = array_pop($fileparts);   

	if(str_contains($filename, 'index') || $filename == "")
		require_once "languages/" . $_SESSION['lang'] . ".php";
	else 
		require_once "../languages/" . $_SESSION['lang'] . ".php";
?>