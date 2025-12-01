<?php
header("Content-Type: text/plain");
$value = $_GET['value'] ?? null;

if(!$value){
    echo "NO VALUE";
    exit;
}

$url = "https://test1-4c0ab-default-rtdb.europe-west1.firebasedatabase.app/data.json";

$data = json_encode(["value" => $value]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

$response = curl_exec($ch);

echo "OK: ".$response;

curl_close($ch);
