<?php
$jumlah="";
if(empty($_GET)){

}else{
    if (isset($_GET["results"]) && count($_GET)===1){
        $jumlah = "results=".$_GET["results"];
    }else if(isset($_GET["gender"]) && count($_GET)===1){
        $jumlah = "results=10&gender=".$_GET["gender"];
    }else if(isset($_GET["results"]) && isset($_GET["gender"])){
        $jumlah = "results=".$_GET["results"]."&gender=".$_GET["gender"];
    }else {
        //$arrakeys= array_keys($_GET);
        //$jumlah = $arrakeys[0]."=".$_GET[$arrakeys[0]];
    }   
}
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://randomuser.me/api?$jumlah",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  //CURLOPT_POSTFIELDS => "results=$results&gender=$gender",
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
  $data = $response->results;
  
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Client</title>
  </head>
  <body>
  <table class="table">
  <thead class="thead-dark">
    <tr>
        <th scope="col">No</th>
        <th scope="col">Picture</th>
        <th scope="col">Full Name</th>
        <th scope="col">Adress</th>
        <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=1; ?>
  <?php foreach ($data as $d) : ?>
    <tr>
      <td> <?php echo $i++ ?> </td>
      <td> <img src= "<?php echo $d->picture->large; ?>"> </td>
      <td> <?php echo $d->name->title.". ".$d->name->first." ".$d->name->last; ?> </td>
      <td> <?php echo $d->location->street." ".$d->location->city.", ".$d->location->state; ?> </td>
      <td> <?php echo $d->email; ?> </td>
    </tr>
        <?php endforeach; ?>
  </tbody>
</table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>