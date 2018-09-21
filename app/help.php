<?php

	class Help {
		
		public function getHelp() {
			$description = array();
			
			$description[] = array("error" => "You need to specify a query you wanna get the response. Available queries are listed below.");
			
			$description[] = array(
				"braviaOff" => "Turns off the Sony Bravia TV",
				"braviaVolumeUp" => "Bravia volume plus one",
				"braviaVolumeDown" => "Bravia volume minus one",
				"braviaToggleMute" => "Bravia toggle mute mode",
				"braviaChannelUp" => "Switch to next channel",
				"braviaChannelDown" => "Switch to previous channel"
			);
			
			return json_encode($description);
		}
		
	}

?>