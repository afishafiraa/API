<?php
    // $url ="https://query.yahooapis.com/v1/public/yql?q=select%2020f";
    //$sUrl = file_get_contents($url, False);
    // $xml =simplexml_load_string($sUrl);

    $url = "http://10.33.34.121/cuaca.xml";
    $xml = simplexml_load_file($url);
    
    //$xml = simplexml_load_file("weather.xml");

    echo "Location : ";
    echo $xml->location->name;
    
    echo "<hr/>";
    echo "Sunrise : ";
    $sun = $xml -> sun -> attributes();
    echo $sun -> rise;
    echo '</br>';
    echo "Sunset : ";
    $sun = $xml -> sun -> attributes();
    echo $sun -> set;
    echo '</br></br>';
    
    $time = $forecast -> $time -> time -> attributes();
    $temperatue = $loc -> wind -> attributes();
    $units = $loc -> units -> attributes(); 
    
    echo "<table border ='1'>
          <thead>
            <th>Tanggal</th>
            <th>Suhu Maksimal</th>
            <th>Suhu Minimum</th>
            <th>Cuaca</th>
          </thead>";
    
    for ($i=0; $i<10 ;$i++){
    $forecast = $cast -> forecast[$i] -> attributes();
    echo "<tr align='center'><td>".$forecast['day'].",";
    echo $forecast['date']."</td>";
    echo "<td>".$forecast['high']."&deg{$units->temperature}</td>";
    echo "<td>".$forecast['low']."&deg{$units->temperature}</td>";
    echo "<td>".$forecast['text']."</td></tr>";
    
    //echo "Forecast Text : ".$forecast -> text."<br/>";
    }
?>