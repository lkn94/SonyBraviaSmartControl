<?php

	class Bravia {
		
		private function sendCommand($command = null) {
			if($command != null) {
				$config = file_get_contents(__DIR__ ."/../config.json");
				$bravia = json_decode($config)->control->Bravia;
				$body = "<?xml version='1.0' encoding='utf-8'?><s:Envelope xmlns:s='http://schemas.xmlsoap.org/soap/envelope/' s:encodingStyle='http://schemas.xmlsoap.org/soap/encoding/'><s:Body><u:X_SendIRCC xmlns:u='urn:schemas-sony-com:service:IRCC:1'><IRCCCode>{$command}</IRCCCode></u:X_SendIRCC></s:Body></s:Envelope>";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "http://". $bravia->address ."/sony/IRCC");
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));
				curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$output = utf8_decode(curl_exec($ch));
				curl_close($ch);
				
				return json_encode(array("OK" => "Command send"));
			}
		}
		
		public function powerOff() {
			$answer = $this->sendCommand("AAAAAQAAAAEAAAAvAw==");
			return $answer;
		}
		
		public function volumeUp() {
			$answer = $this->sendCommand("AAAAAQAAAAEAAAASAw==");
			return $answer;
		}
		
		public function volumeDown() {
			$answer = $this->sendCommand("AAAAAQAAAAEAAAATAw==");
			return $answer;
		}
		
		public function toggleMute() {
			$answer = $this->sendCommand("AAAAAQAAAAEAAAAUAw==");
			return $answer;
		}
		
		public function channelUp() {
			$answer = $this->sendCommand("AAAAAQAAAAEAAAAQAw==");
			return $answer;
		}
		
		public function channelDown() {
			$answer = $this->sendCommand("AAAAAQAAAAEAAAARAw==");
			return $answer;
		}
		
	}

?>