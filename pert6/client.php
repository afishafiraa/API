<?php
    $curl = curl_init();
    curl_setopt_array($curl,[
        CURLOPT_RETURNTRANSFER => 0,
        CURLOPT_URL => 'http://10.33.34.121?key=1234'
    ]);
    $result = curl_exec($curl);
    curl_close($curl);

    //print_r($result);

