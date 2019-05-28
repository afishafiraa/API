<?php

@$origin = $_GET['origin'];
@$destination = $_GET['destination'];
@$weight = $_GET['weight'];
@$courier = $_GET['courier'];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: 088f4e2fc485dc63ac97f8e2b97e509e"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    echo $response;
    //$response = json_decode($response);
    //echo $response->rajaongkir->status->code;
    //cost = $response->rajaongkir->results;
  
    //echo json_encode($cost);
    ;
}