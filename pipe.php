<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.pipedrive.com/v1/persons?start=0&api_token=51c907f748371ece6722554ddc028fb30ad87098",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Postman-Token: 0a84957f-4edc-407f-a3ff-65d319f6b0ba",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    $response = json_decode($response, true);
    $data = $response["data"];
    foreach($data as $p)
    {
        //return $p;
        $name = $p['phone']['value'];
        
        echo "<p><b>Nome:</b> ".$name."</p>";
        
    }
}
