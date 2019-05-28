<?php

$province = $_GET['province'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 088f4e2fc485dc63ac97f8e2b97e509e"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
  $response = json_decode($response);
  //echo $response->rajaongkir->status->code;
  $city = $response->rajaongkir->results;

  echo "<table border='1'>
  <thead>
      <th>ID</th>
      <th>Nama Kota/Kabupaten</th>
  </thead>";
  foreach($city as $c){
    echo "<tr align='center'><tr>";
    echo "<td>".$c->city_id."</td>";
    echo "<td>".$c->type." ".$c->city_name."</td>";	
			}
	echo "</table>";
    //echo $p->province_id." ".$p->province."<br/>";
  }