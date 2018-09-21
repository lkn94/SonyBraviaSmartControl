<?php
	$data = file_get_contents(__DIR__ ."/../config.json");
?>
<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <title>Homecontrol</title>
  </head>
  <body>
	<h1>Geräte</h1>
	
	<?php include "menu.php"; ?>
	
	<p>
		<div class="alert alert-info">
			<strong>Info</strong> Hier sind alle Server im Netz aufgeführt.
		</div>
	</p>
	
	<table class="table table-striped table-hover table-responsive">
		<thead>
			<tr>
				<th>Servername</th><th>Adresse</th><th>Standort</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach(json_decode($data)->devices as $device) {
					echo "<tr><td>{$device->name}</td><td><a href='http://{$device->address}' target='_blank'>{$device->address}</a></td><td>{$device->location}</td></tr>";
				}
			?>
		</tbody>
	</table>
	
  </body>
</html>