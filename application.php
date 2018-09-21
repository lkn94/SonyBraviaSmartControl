<?php

	require("app/bravia.php");
	header('Content-Type: application/json');
	
	$answer = null;
	$system = null;
	if(isset($_GET["system"])) {
		$system = $_GET["system"];
	}

	switch ($_GET["query"]) {
		case "braviaOff":
			$bravia = new Bravia();
			$answer = $bravia->powerOff();
			$bravia = null;
			break;
		case "braviaVolumeUp":
			$bravia = new Bravia();
			$answer = $bravia->volumeUp();
			$bravia = null;
			break;
		case "braviaVolumeDown":
			$bravia = new Bravia();
			$answer = $bravia->volumeDown();
			$bravia = null;
			break;
		case "braviaToggleMute":
			$bravia = new Bravia();
			$answer = $bravia->toggleMute();
			$bravia = null;
			break;
		case "braviaChannelUp":
			$bravia = new Bravia();
			$answer = $bravia->channelUp();
			$bravia = null;
			break;
		case "braviaChannelDown":
			$bravia = new Bravia();
			$answer = $bravia->channelDown();
			$bravia = null;
			break;
		default:
			$help = new Help();
			$answer = $help->getHelp();
			$help = null;
			break;
			
	}
	
	echo $answer;

?>