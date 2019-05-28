<?php
    // $url ="https://query.yahooapis.com/v1/public/yql?q=select%2020f";
    //$sUrl = file_get_contents($url, False);
    // $xml =simplexml_load_string($sUrl);

    //$url = "http://10.33.34.121/weather.xml";
    //$xml = simplexml_load_file($url);
    
    $xml = simplexml_load_file("weather.xml");

    echo "Title : ";
    echo $xml->channel->title;
    echo '</br></br>';
    echo "Description : ";
    echo $xml->channel->description;
    echo '</br></br>';
    echo "Build Date : ";
    echo $xml->channel->lastBuildDate;
   
    echo "<hr/>";

    $namespace = $xml -> channel -> getNamespaces(true);
    $loc = $xml -> channel -> children($namespace['yweather']);
    $location = $loc -> location -> attributes();
    echo "Location Country : ";
    echo $location -> country;

    echo '</br></br>';
  
    $cuaca = $xml -> channel -> item -> getNamespaces(true);
    $temp = $xml -> channel -> item -> children($cuaca['yweather']);
    $condition = $temp -> condition -> attributes();
    echo "Condition Date : ";
    echo $condition -> date;

    echo '</br></br>';
    
    $astronomy = $loc -> astronomy -> attributes();
    $wind = $loc -> wind -> attributes();
    $units = $loc -> units -> attributes(); 
    $fore = $xml -> channel -> item -> getNamespaces(true);
    $cast = $xml -> channel -> item -> children($fore['yweather']);

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