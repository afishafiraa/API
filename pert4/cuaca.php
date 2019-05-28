<?php
	$url="http://10.33.34.121/cuaca.xml";
	$xml = simplexml_load_file("cuaca.xml");

	echo "<h1>".$xml->location->name."</h1>";
	echo "<br>";
	echo "<hr>";

	$sun = $xml->sun->attributes();
	echo $sun['rise'];
	echo "<br>";
	echo $sun['set'];
	echo "<hr>";

	echo "<table border='1'>
		<thead>
			<th>Time</th>
			<th>Suhu Maksimal</th>
			<th>Suhu Minimal</th>
			<th>Awan</th>
		</thead>";

	
		for($i=0; $i<30;$i++){
			$time = $xml->forecast->time[$i]->attributes();
			$temperature = $xml->forecast->time[$i]->temperature->attributes();
			$clouds = $xml->forecast->time[$i]->clouds->attributes();
	
			echo "<tr align='center'><td>".$time['from']." - ";
			echo $time['to']."</td>";
			echo "<td>".$temperature['max']." "; echo $temperature['unit']."</td>";
			echo "<td>".$temperature['min']." "; echo $temperature['unit']."</td>";
			echo "<td>".$clouds['value']."</td>";
			
			}
			echo "</table>";
	