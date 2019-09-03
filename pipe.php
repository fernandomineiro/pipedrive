<?php

$url = 'https://api.pipedrive.com/v1/persons?start=0&api_token=51c907f748371ece6722554ddc028fb30ad87098';
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Accept: application/json",
        'Content-type' => 'application/json',
        "Accept-Encoding: gzip, deflate",
        "Connection: keep-alive",
        "Host: api.pipedrive.com",
        "authorization: Token 51c907f748371ece6722554ddc028fb30ad87098",
        "cache-control: no-cache",
        "content-type: application/json"
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
    foreach($data as $p){
    $res = $p['phone']['value'];
    echo "<b>Telefone: </b>". $res;
    }
}
