<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//from URL way fetching data
// $url = "https://api.publicapis.org/entries";

//making api call
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($curl, CURLOPT_HEADER, false);
// $data = curl_exec($curl);
// curl_close($curl);

//fetch data from file
$data = file_get_contents('entries.json');
$response  = json_decode($data);
$entries = $response->entries;

//retrieving API only on array
$api_array = [];
foreach($entries as $value){
    if(!in_array($value->API, $api_array)){
        $api_array[] = $value->API;
    }
}

//sorting array in descending order
natcasesort($api_array);
$api_array = array_reverse($api_array, false);

echo "<pre>";
print_r($api_array);
echo "</pre>";
exit();